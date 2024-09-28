@extends('layouts.dashboard.admin.master')
@section('content')
    @include('components.dashboard.admin.management.customers.data')
    @include('components.dashboard.admin.management.customers.delete-modal')
@endsection

@section('script')
    <script>
        getData();

        async function getData() {
            showLoader();
            const respons = await axios.get("{{ route('admin.customers.all') }}");
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            respons.data.data.forEach(function(item, index) {
                // random phone number like 0160552236
                let phone = "01" + Math.floor(Math.random() * 1000000000);
                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.email}</td>
                    <td>${phone}</td>
                    <td><span class="badge badge-success">Active</span></td>

                    <td>
                        <button type="button"class="deleteBtn btn btn-danger" data-no="${item.id}">Delete</button>
                    </td>
                    </tr>`;
                tableList.append(row);
            });
             // <td><span href="#" class="badge badge-${item.availability ? "success" : "warning"}">${item.availability ? "Available" : "Not Available"}</span></td>

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

        async function deleteItem() {
            let id = $("#deleteId").val();
            showLoader();
            const response = await axios.delete(`/admin/customers/${id}`);

            hideLoader();
            if (response.data.status == "success") {
                $("#deleteModal").modal("hide");
                await getData();
                successToast(response.data.message);
            } else {
                errorToast(response.data.message);
            }
        }
    </script>
@endsection
