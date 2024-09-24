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

            // $(".editBtn").on("click", async function() {
            //     let id = $(this).data("no");
            //     document.getElementById("save-form").reset();
            //     await fillupEditForm(id);
            //     $("#addModal").modal("show");
            // });

            // $(".deleteBtn").on("click", function() {
            //     let id = $(this).data("no");
            //     $("#deleteModal").modal("show");
            //     $("#deleteId").val(id);
            // });

            $('#tableData').DataTable({
                "bInfo": false,
                "bLengthChange": false,
                "paging": false
            });

        }


    </script>
@endsection
