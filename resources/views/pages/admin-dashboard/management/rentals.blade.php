@extends('layouts.dashboard.admin.master')
@section('content')
    @include('components.dashboard.admin.management.rentals.data')
    @include('components.dashboard.admin.management.rentals.delete-modal')
@endsection
@section('script')
    <script>
        getData();

        async function getData() {
            showLoader();
            const respons = await axios.get("{{ route('admin.rentals.all') }}");
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            respons.data.data.forEach(function(item, index) {

                const now = new Date().toISOString().split('T')[0];
                if (item.start_date > now) {
                    status = 'Upcoming';
                    badgeClass = 'info'; // Future status
                } else if (item.end_date >= now) {
                    status = 'Ongoing';
                    badgeClass = 'success'; // Current status
                } else {
                    status = 'Expired';
                    badgeClass = 'danger'; // Past status
                }

                let row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item.user.name}</td>
                        <td>${item.car.name}</td>
                        <td>${item.start_date}</td>
                        <td>${item.end_date}</td>
                        <td><span class="badge badge-${badgeClass}">${status}</span></td>
                        <td>
                        <button type="button"class="deleteBtn btn btn-secondary" data-status="${status}" data-no="${item.id}">Cancel</button>
                        </td>
                        </tr>`;
                tableList.append(row);
            });
            // <td><span href="#" class="badge badge-${item.availability ? "success" : "warning"}">${item.availability ? "Available" : "Not Available"}</span></td>

            $(".deleteBtn").on("click", function() {
                let id = $(this).data("no");
                let status = $(this).data("status");

                if (status == 'Upcoming') {
                    $("#deleteId").val(id);
                    $("#deleteModal").modal("show");
                } else if(status == 'Ongoing') {
                    errorToast("Sorry, this item is currently being rented");
                } else {
                    $("#deleteId").val(id);
                    $("#deleteModal").modal("show");
                }
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
            const response = await axios.delete(`/admin/rentals/${id}`);

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
