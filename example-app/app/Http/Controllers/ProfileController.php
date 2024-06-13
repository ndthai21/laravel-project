<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ProfileCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::where('user_id', Auth::id())->get();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $profile = Profile::create([
            'user_id' => Auth::id(),
            'status' => 'chưa gửi',
        ]);

        foreach ($request->criteria as $category => $criteria) {
            foreach ($criteria as $criterion) {
                $file_path = '';
                if (isset($criterion['file'])) {
                    $file_path = $criterion['file']->store('criteria_files', 'public');
                }
                ProfileCriteria::create([
                    'profile_id' => $profile->id,
                    'criterion' => $criterion['criterion'],
                    'score' => isset($criterion['score']) ? $criterion['score'] : null,
                    'score2' => isset($criterion['score2']) ? $criterion['score2'] : null,
                    'average' => isset($criterion['average']) ? $criterion['average'] : null,
                    'school_year' => isset($criterion['school_year']) ? $criterion['school_year'] : '',
                    'file_path' => $file_path,
                    'status' => 'pending',
                    'category' => $category,
                ]);
            }
        }

        return redirect()->route('profiles.index')->with('success', 'Tạo hồ sơ thành công!');
    }

    public function show(Profile $profile)
    {
        $criteriaByCategory = $profile->criteria->groupBy('category');
        return view('profiles.show', compact('profile', 'criteriaByCategory'));
    }

    public function edit(Profile $profile)
    {
        $criteriaByCategory = $profile->criteria->groupBy('category');
        return view('profiles.edit', compact('profile', 'criteriaByCategory'));
    }

    public function update(Request $request, Profile $profile)
    {
        if ($request->has('criteria')) {
            foreach ($request->criteria as $category => $criteria) {
                foreach ($criteria as $criterionData) {

                    if (isset($criterionData['id'])) {
                        $profileCriterion = ProfileCriteria::find($criterionData['id']);
                        if ($profileCriterion) {
                            if (isset($criterionData['file'])) {
                                $file = $criterionData['file'];
                                $file_path = $file->store('criteria_files', 'public');
                                $profileCriterion->file_path = $file_path;
                            }

                            $profileCriterion->update([
                                'criterion' => $criterionData['criterion'],
                                'score' => $criterionData['score'] ?? $profileCriterion->score,
                                'score2' => $criterionData['score2'] ?? $profileCriterion->score2,
                                'average' => $criterionData['average'] ?? $profileCriterion->average,
                                'school_year' => $criterionData['school_year'] ?? $profileCriterion->school_year,
                                'status' => $criterionData['status'] ?? $profileCriterion->status,
                            ]);
                        }
                    } else {
                        $file_path = '';
                        if (isset($criterionData['file'])) {
                            $file_path = $criterionData['file']->store('criteria_files', 'public');
                        }

                        $newCriterion = new ProfileCriteria([
                            'profile_id' => $profile->id,
                            'category' => $category,
                            'criterion' => $criterionData['criterion'],
                            'score' => $criterionData['score'] ?? null,
                            'score2' => $criterionData['score2'] ?? null,
                            'average' => $criterionData['average'] ?? null,
                            'school_year' => $criterionData['school_year'] ?? null,
                            'file_path' => $file_path,
                            'status' => $criterionData['status'] ?? 'pending',
                        ]);

                        $newCriterion->save();
                    }
                }
            }
        }
        return redirect()->route('profiles.show', $profile->id)->with('success', 'Cập nhật hồ sơ thành công.');
    }

    public function destroy(Profile $profile)
    {
        $profile->criteria()->delete();
        $profile->delete();
        return redirect()->route('profiles.index')->with('status', 'Profile deleted successfully');
    }

    public function submitToTeacherA(Profile $profile)
    {
        $profile->update(['status' => 'Đã gửi cho Liên Chi']);
        return redirect()->route('profiles.index')->with('status', 'Hồ sơ đã được gửi cho giáo viên A.');
    }

    public function teacherAIndex()
    {
        $profiles = Profile::where('status', 'Đã gửi cho Liên Chi')->get();
        return view('A.index', compact('profiles'));
    }

    public function teacherAReview(Profile $profile)
    {
        $criteriaByCategory = $profile->criteria->groupBy('category');
        return view('A.review', compact('profile', 'criteriaByCategory'));
    }

    public function updateStatus(Request $request, Profile $profile)
    {
        if ($request->has('criteria')) {
            foreach ($request->criteria as $category => $criteria) {
                foreach ($criteria as $criterionData) {
                    if (isset($criterionData['id'])) {
                        $profileCriterion = ProfileCriteria::find($criterionData['id']);
                        if ($profileCriterion) {
                            $profileCriterion->update(['status' => $criterionData['status'] ?? $profileCriterion->status]);
                        }
                    }
                }
            }
        }
        return redirect()->route('profiles.teacherAIndex', $profile->id)->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function approveByA(Profile $profile)
    {
        $profile->update(['status' => 'đã duyệt qua Liên Chi']);
        return redirect()->route('profiles.teacherAIndex')->with('status', 'Profile approved successfully');
    }

    public function rejectByA(Profile $profile)
    {
        $profile->update(['status' => 'hồ sơ bị từ chối bởi liên Chi']);
        return redirect()->route('profiles.teacherAIndex')->with('status', 'Profile rejected successfully');
    }

    // teacher_b
    public function submitToTeacherB(Profile $profile)
    {
        $profile->update(['status' => 'submitted_to_teacher_b']);
        return redirect()->route('profiles.index')->with('status', 'Hồ sơ đã được gửi cho giáo viên B.');
    }

    public function teacherBIndex()
    {
        $profiles = Profile::where('status', 'đã duyệt qua Liên Chi')->get();
        return view('B.index', compact('profiles'));
    }

    public function teacherBReview(Profile $profile)
    {
        $criteriaByCategory = $profile->criteria->groupBy('category');
        return view('B.review', compact('profile', 'criteriaByCategory'));
    }

    public function updateStatusB(Request $request, Profile $profile)
    {
        if ($request->has('criteria')) {
            foreach ($request->criteria as $category => $criteria) {
                foreach ($criteria as $criterionData) {
                    if (isset($criterionData['id'])) {
                        $profileCriterion = ProfileCriteria::find($criterionData['id']);
                        if ($profileCriterion) {
                            $profileCriterion->update(['status' => $criterionData['status'] ?? $profileCriterion->status]);
                        }
                    }
                }
            }
        }
        return redirect()->route('profiles.teacherBIndex', $profile->id)->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function approveByB(Profile $profile)
    {
        $profile->update(['status' => 'Chúc mừng bạn đã đạt danh hiệu sinh viên 5 tốt']);
        return redirect()->route('profiles.teacherBIndex')->with('status', 'Profile approved successfully');
    }

    public function rejectByB(Profile $profile)
    {
        $profile->update(['status' => 'Hồ sơ bị từ chối bởi hội đồng đánh giá']);
        return redirect()->route('profiles.teacherBIndex')->with('status', 'Profile rejected successfully');
    }
}
