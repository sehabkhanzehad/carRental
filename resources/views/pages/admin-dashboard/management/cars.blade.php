@extends('layouts.dashboard.admin.master')

@section('content')
    @include('components.dashboard.admin.management.cars.data')
    @include('components.dashboard.admin.management.cars.create-modal')
    @include('components.dashboard.admin.management.cars.delete-modal')
@endsection

@section('script')
    <script>
        getData();

        async function getData() {
            showLoader();
            const respons = await axios.get("{{ route('admin.cars.all') }}");
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            respons.data.data.forEach(function(item, index) {
                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td> <img src="${item.image}" class="rounded-circle wd-35" alt="team"></td>
                    <td>${item.brand}</td>
                    <td>${item.model}</td>
                    <td>${item.year}</td>
                    <td>${item.car_type}</td>
                    <td>${item.daily_rent_price}</td>
                    <td><span href="#" class="badge badge-${item.availability ? "success" : "warning"}">${item.availability ? "Available" : "Not Available"}</span></td>
                    <td>
                        <button type="button"class="editBtn btn btn-success" data-no="${item.id}">Edit</button>
                        <button type="button"class="deleteBtn btn btn-danger" data-no="${item.id}">Delete</button>
                    </td>
                    </tr>`;
                tableList.append(row);
            });

            $(".editBtn").on("click", async function() {
                let id = $(this).data("no");
                document.getElementById("save-form").reset();
                await fillupEditForm(id);
            });

            $(".deleteBtn").on("click", function() {
                let id = $(this).data("no");
                $("#deleteModal").modal("show");
                $("#deleteId").val(id);
            });

            $('#tableData').DataTable({
                "bInfo": false,
                "bLengthChange": false,
                "paging": false
            });

        }

        function openModal() {
            document.getElementById("blah1").src = "{{ asset('assets/admin-dashboard/images/placeholde2.png') }}";
            document.getElementById("save-form").reset();
            document.getElementById('modalTitle').innerHTML = "Add Car";
            document.getElementById('addBtn').innerHTML = "Add";
            document.getElementById('addBtn').setAttribute("onclick", "addData()");
            $("#addModal").modal("show");
        }

        async function addData() {
            let name = $("#name").val();
            let brand = $("#brand").val();
            let model = $("#model").val();
            let car_type = $("#type").val();
            let year = $("#year").val();
            let daily_rent_price = $("#rate").val();
            daily_rent_price = parseFloat(daily_rent_price);
            let image = document.getElementById('image').files[0];

            if (name == "" && brand == "" && model == "" && car_type == "" && year == "" && daily_rent_price == "" && !
                image) {
                errorToast("All fields are required.");
            } else if (name == "") {
                errorToast("Please enter car name.");
            } else if (brand == "") {
                errorToast("Please enter car brand.");
            } else if (model == "") {
                errorToast("Please enter car model.");
            } else if (car_type == "") {
                errorToast("Please enter car type.");
            } else if (year == "") {
                errorToast("Please enter year of manufacture.");
            } else if (daily_rent_price === "" || isNaN(daily_rent_price)) {
                errorToast("Please enter a valid daily rent price.");
            } else if (daily_rent_price <= 0) {
                errorToast("Price should be greater than zero.");
            } else if (!image) {
                errorToast("Please select car image.");
            } else {
                let formData = new FormData();

                formData.append("name", name);
                formData.append("brand", brand);
                formData.append("model", model);
                formData.append("car_type", car_type);
                formData.append("year", year);
                formData.append("daily_rent_price", daily_rent_price);
                formData.append("image", image);

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                    },
                }
                showLoader();
                try {
                    const response = await axios.post("{{ route('admin.cars.store') }}", formData, config);
                    hideLoader();
                    if (response.data.status == "success") {
                        $("#addModal").modal("hide");
                        await getData();
                        document.getElementById('save-form').reset();
                        successToast(response.data.message);
                    } else {
                        errorToast(response.data.message);
                    }
                } catch (err) {
                    hideLoader();
                    errorToast("Something wen't wrong. Please try again later.");
                }
            }
        }

        async function fillupEditForm(id) {
            try {
                showLoader();
                const response = await axios.get(`/admin/cars/${id}`);
                hideLoader();

                $("#modalTitle").text("Edit Car");
                $("#addBtn").text("Update");
                $("#addBtn").attr("onclick", "updateItem()");

                $("#dataId").val(response.data.data.id);
                $("#name").val(response.data.data.name);
                $("#brand").val(response.data.data.brand);
                $("#model").val(response.data.data.model);
                $("#type").val(response.data.data.car_type);
                $("#year").val(response.data.data.year);
                $("#rate").val(response.data.data.daily_rent_price);

                $("#blah1").attr("src", response.data.data.image);
                $("#addModal").modal("show");

            } catch (error) {
                hideLoader();
                // console.error("Error fetching car details", error);
                errorToast("Something wen't wrong. Please try again later.");
            }
        }

        async function updateItem() {
            let id = document.getElementById('dataId').value;
            let name = $("#name").val();
            let brand = $("#brand").val();
            let model = $("#model").val();
            let car_type = $("#type").val();
            let year = $("#year").val();
            let daily_rent_price = $("#rate").val();
            daily_rent_price = parseFloat(daily_rent_price);
            let image = document.getElementById('image').files[0];

            if (name == "" && brand == "" && model == "" && car_type == "" && year == "" && daily_rent_price == "") {
                errorToast("All fields are required.");
            } else if (name == "") {
                errorToast("Please enter car name.");
            } else if (brand == "") {
                errorToast("Please enter car brand.");
            } else if (model == "") {
                errorToast("Please enter car model.");
            } else if (car_type == "") {
                errorToast("Please enter car type.");
            } else if (year == "") {
                errorToast("Please enter year of manufacture.");
            } else if (daily_rent_price === "" || isNaN(daily_rent_price)) {
                errorToast("Please enter a valid daily rent price.");
            } else if (daily_rent_price <= 0) {
                errorToast("Price should be greater than zero.");
            } else {
                let formData = new FormData();

                formData.append("name", name);
                formData.append("brand", brand);
                formData.append("model", model);
                formData.append("car_type", car_type);
                formData.append("year", year);
                formData.append("daily_rent_price", daily_rent_price);
                formData.append("image", image);

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                    },
                }
                showLoader();
                try {
                    const response = await axios.post(`/admin/cars/${id}`, formData, config);

                    hideLoader();
                    if (response.data.status == "success") {
                        $("#addModal").modal("hide");
                        await getData();
                        document.getElementById('save-form').reset();
                        successToast(response.data.message);
                    } else {
                        errorToast(response.data.message);
                    }
                } catch (err) {
                    hideLoader();
                    errorToast("Something wen't wrong. Please try again later.");
                }
            }
        }







        async function deleteItem() {
            let id = $("#deleteId").val();
            showLoader();
            // const response = await axios.delete("{{ route('admin.cars.destroy', ':id') }}".replace(':id', id));
            const response = await axios.delete(`/admin/cars/${id}`);

            hideLoader();
            if (response.data.status == "success") {
                $("#deleteModal").modal("hide");
                await getData();
                successToast(response.data.message);
            } else if (response.data.status == "failed") {
                errorToast(response.data.message);
            } else {
                errorToast(response.data.message);
            }
        }
    </script>
@endsection
