<!-- Job Posting Form Modal -->
<div class="modal fade" id="postJobModal" tabindex="-1" aria-labelledby="postJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="postJobModalLabel">Post a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="px-sm-2 px-md-3 px-lg-5">
                    <div class="mb-3 text-start">
                        <label for="jobTitle" class="form-label text-body-emphasis">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="companyName" class="form-label text-body-emphasis">Company Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="location" class="form-label text-body-emphasis">Location</label>
                        <input type="text" class="form-control" id="location" placeholder="Enter Location">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="salary" class="form-label text-body-emphasis">Salary</label>
                        <div class="input-group">
                            <span class="input-group-text">Rs</span>
                            <input type="number" class="form-control" id="min-salary" placeholder="Enter Minimum Salary">
                            <input type="number" class="form-control" id="max-salary" placeholder="Enter Maximum Salary">
                        </div>

                    </div>
                    <div class="mb-3 text-start">
                        <label for="contractLength" class="form-label text-body-emphasis">Contract Length</label>
                        <input type="text" class="form-control" id="contractLength" placeholder="Enter contract length">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="experience" class="form-label text-body-emphasis">Experience</label>
                        <input type="text" class="form-control" id="experience" placeholder="Enter experience">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="jobType" class="form-label text-body-emphasis">Job Type</label>
                        <select class="form-select" id="jobType">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="schedule" class="form-label text-body-emphasis">Schedule</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="schedule" id="dayShift" value="Full-time" required>
                                <label class="form-check-label text-body-emphasis" for="dayShift">
                                    Day Shift
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="schedule" id="usShift" value="Part-time">
                                <label class="form-check-label text-body-emphasis" for="usShift">
                                    US Shift
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="description" class="form-label text-body-emphasis">Job Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter bullet points (one per line)"></textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="responsibilities" class="form-label text-body-emphasis">Responsibilities</label>
                        <textarea class="form-control" id="responsibilities" rows="4" placeholder="Enter bullet points (one per line)"></textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="qualifications" class="form-label text-body-emphasis">Qualifications</label>
                        <textarea class="form-control" id="qualifications" rows="4" placeholder="Enter bullet points (one per line)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>