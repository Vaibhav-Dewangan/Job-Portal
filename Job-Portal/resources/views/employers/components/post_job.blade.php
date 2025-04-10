<!-- Job Posting Form Modal -->
<div class="modal fade " id="postJobModal" tabindex="-1" aria-labelledby="postJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-5 border-start border-primary rounded-3">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="postJobModalLabel">Post a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('job.post') }}" method="post" class="px-sm-2 px-md-3 px-lg-5">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="jobTitle" class="form-label text-body-emphasis">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter Job Title">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="location" class="form-label text-body-emphasis">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="location" class="form-label text-body-emphasis">Website Link</label>
                        <input type="text" class="form-control" id="company_website" name="company_website" placeholder="Enter website link">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="salary" class="form-label text-body-emphasis">Salary</label>
                        <div class="input-group">
                            <span class="input-group-text">Rs</span>
                            <input type="number" class="form-control" id="min_salary" name="min_salary" placeholder="Enter Minimum Salary">
                            <input type="number" class="form-control" id="max_salary" name="max_salary" placeholder="Enter Maximum Salary">
                        </div>

                    </div>
                    <div class="mb-3 text-start">
                        <label for="industry_sector" class="form-label text-body-emphasis">Industry Sector</label>
                        <select class="form-select" name="industry_sector" id="industry_sector">
                            <option value="" disabled selected>Select Industry</option>
                            <option value="information technology">Information Technology (IT)</option>
                            <option value="healthcare">Healthcare & Medical</option>
                            <option value="finance">Finance & Banking</option>
                            <option value="education">Education & Training</option>
                            <option value="construction">Construction & Engineering</option>
                            <option value="marketing">Marketing & Advertising</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="contractLength" class="form-label text-body-emphasis">Contract Length</label>
                        <input type="text" class="form-control" id="contractLength" name="contract_length" placeholder="Enter contract length">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="experience" class="form-label text-body-emphasis">Experience</label>
                        <input type="text" class="form-control" id="experience" name="experience" placeholder=" Enter experience">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="jobType" class="form-label text-body-emphasis">Job Type</label>
                        <select class="form-select" id="jobType" name="job_type">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="schedule" class="form-label text-body-emphasis">Schedule</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="schedule[]" id="dayShift" value="Day Shift" required>
                                <label class="form-check-label text-body-emphasis" for="dayShift">
                                    Day Shift
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="schedule[]" id="usShift" value="US Shift">
                                <label class="form-check-label text-body-emphasis" for="usShift">
                                    US Shift
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="skills" class="form-label text-body-emphasis">Skills Required</label>
                        <textarea class="form-control" id="skills" name="skills" rows="4" placeholder="skill-1,skill-2 ..."></textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="description" class="form-label text-body-emphasis">Job Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter bullet points (one per line)"></textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="responsibilities" class="form-label text-body-emphasis">Responsibilities</label>
                        <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" placeholder="Enter bullet points (one per line)"></textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="qualifications" class="form-label text-body-emphasis">Qualifications</label>
                        <textarea class="form-control" id="qualifications" name="qualifications" rows="4" placeholder="Enter bullet points (one per line)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>