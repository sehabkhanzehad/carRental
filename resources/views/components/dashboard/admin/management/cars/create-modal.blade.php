<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="save-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Car Name</label>
                                <input type="hidden" class="" id="dataId">
                                <input type="text" class="form-control" id="name" placeholder="Enter car name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" placeholder="Enter brand name">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Model</label>
                                <input type="text" class="form-control" id="model" placeholder="Enter model name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Car Type</label>
                                <input type="text" class="form-control" id="type" placeholder="Enter car type (like Sedan, SUV, etc)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Year of Manufacture</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select year</option>
                                    {{-- start loop from 2024 to 2010 --}}
                                    @for ($i = 2024; $i >= 2010; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Daily Rate</label>
                                <input type="number" class="form-control" id="rate" name="rate" min="0" step="0.01" placeholder="Enter price">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Car Image</label>
                                <input id="image" type="file" name="image"
                                    onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])" class="form-control">

                                <div class="my-3">
                                    <img src="{{ asset('assets/admin-dashboard/images/default_profile.png') }}"
                                        style="border-radius: 5px" id="blah1" width="80" height="80"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="addBtn" onclick="addData()" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

