<!-- Job Posting Form Modal -->
<div class="modal fade " id="editJobModal-{{ $job->id }}" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-5 border-start border-primary rounded-3">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="editJobModalLabel">Edit a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('job.edit') }}" method="post" class="px-sm-2 px-md-3 px-lg-5">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <div class="mb-3 text-start">
                        <label for="jobTitle" class="form-label text-body-emphasis">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter Job Title"
                            value="{{old('job_title', $job->job_title)}}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="location" class="form-label text-body-emphasis">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location"
                            value="{{old('location', $job->location)}}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="location" class="form-label text-body-emphasis">Website Link</label>
                        <input type="text" class="form-control" id="company_website" name="company_website" placeholder="Enter website link"
                            value="{{old('company_website', $job->company_website)}}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="salary" class="form-label text-body-emphasis">Salary</label>
                        <div class="input-group">
                            <span class="input-group-text">Rs</span>
                            <input type="number" class="form-control" id="min_salary" name="min_salary" placeholder="Enter Minimum Salary"
                                value="{{old('min_salary', $job->min_salary)}}">
                            <input type="number" class="form-control" id="max_salary" name="max_salary" placeholder="Enter Maximum Salary"
                                value="{{old('max_salary', $job->max_salary)}}">
                        </div>

                    </div>
                    <div class="mb-3 text-start">
                        <label for="industry_sector" class="form-label text-body-emphasis">Industry Sector</label>
                        <select class="form-select" name="industry_sector" id="industry_sector">
                            <option value="" disabled>Select Industry</option>
                            <option value="information technology" {{ old('industry_sector', $job->industry_sector) == 'information technology' ? 'selected' : '' }}>Information Technology (IT)</option>
                            <option value="healthcare" {{ old('industry_sector', $job->industry_sector) == 'healthcare' ? 'selected' : '' }}>Healthcare & Medical</option>
                            <option value="finance" {{ old('industry_sector', $job->industry_sector) == 'finance' ? 'selected' : '' }}>Finance & Banking</option>
                            <option value="education" {{ old('industry_sector', $job->industry_sector) == 'education' ? 'selected' : '' }}>Education & Training</option>
                            <option value="construction" {{ old('industry_sector', $job->industry_sector) == 'construction' ? 'selected' : '' }}>Construction & Engineering</option>
                            <option value="marketing" {{ old('industry_sector', $job->industry_sector) == 'marketing' ? 'selected' : '' }}>Marketing & Advertising</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="contractLength" class="form-label text-body-emphasis">Contract Length</label>
                        <input type="text" class="form-control" id="contractLength" name="contract_length" placeholder="Enter contract length"
                            value="{{old('contract_length', $job->contract_length)}}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="experience" class="form-label text-body-emphasis">Experience</label>
                        <input type="text" class="form-control" id="experience" name="experience" placeholder=" Enter experience"
                            value="{{old('experience', $job->experience)}}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="jobType" class="form-label text-body-emphasis">Job Type</label>
                        <select class="form-select" id="jobType" name="job_type">
                            <option value="Full-time" {{ old('job_type', $job->job_type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('job_type', $job->job_type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        @php
                        $selectedSchedules = old('schedule', $job->schedule ?? []);
                        @endphp
                        <label for="schedule" class="form-label text-body-emphasis">Schedule</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="schedule[]" id="dayShift" value="Day Shift"
                                    {{ in_array('Day Shift', $selectedSchedules) ? 'checked' : '' }}>
                                <label class="form-check-label text-body-emphasis" for="dayShift">
                                    Day Shift
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="schedule[]" id="usShift" value="US Shift"
                                    {{ in_array('US Shift', $selectedSchedules) ? 'checked' : '' }}>
                                <label class="form-check-label text-body-emphasis" for="usShift">
                                    US Shift
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="skills" class="form-label text-body-emphasis">Skills Required</label>
                        <textarea class="form-control" id="skills" name="skills" rows="4" placeholder="skill-1,skill-2 ..."> {{old('skills', $job->skills)}}</textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="description" class="form-label text-body-emphasis">Job Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter bullet points (one per line)"> {{old('description', $job->description)}}</textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="responsibilities" class="form-label text-body-emphasis">Responsibilities</label>
                        <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" placeholder="Enter bullet points (one per line)">{{old('responsibilities', $job->responsibilities)}}</textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="qualifications" class="form-label text-body-emphasis">Qualifications</label>
                        <textarea class="form-control text-start" id="qualifications" name="qualifications" rows="4" placeholder="Enter bullet points (one per line)">{{old('qualifications', $job->qualifications)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>