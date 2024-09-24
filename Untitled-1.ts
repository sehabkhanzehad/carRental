  // async function fillupEditForm(id) {
        //     showLoader();
        //     const respons = await axios.get("{{ route('service.id') }}", {
        //         params: {
        //             id: id
        //         }
        //     });
        //     hideLoader();
        //     document.getElementById('dataId').value = respons.data.data.id;
        //     document.getElementById('modalTitle').innerHTML = "Edit Service";
        //     document.getElementById('addBtn').innerHTML = "Update";
        //     document.getElementById('addBtn').setAttribute("onclick", "updateService()");

        //     document.getElementById('name').value = respons.data.data.name;
        //     document.getElementById('shortDes').value = respons.data.data.short_des;
        //     document.getElementById('blah1').src = respons.data.data.image;
        // }

        function openModal() {
            document.getElementById("blah1").src = "{{ asset('assets/dashboard/images/default_profile.png') }}";
            document.getElementById("save-form").reset();
            document.getElementById('modalTitle').innerHTML = "Add Service";
            document.getElementById('addBtn').innerHTML = "Add";
            document.getElementById('addBtn').setAttribute("onclick", "addData()");
            $("#addModal").modal("show");
        }

        // async function addData() {
        //     let name = document.getElementById('name').value;
        //     let image = document.getElementById('image').files[0];
        //     let short_des = document.getElementById('shortDes').value;

        //     if (name == "" && short_des == "" && !image) {
        //         errorToast("Please enter any one field.");
        //     } else if (name == "") {
        //         errorToast("Please enter a service name.");
        //     } else if (short_des == "") {
        //         errorToast("Please enter a short description.");
        //     } else if (!image) {
        //         errorToast("Please select an image.");
        //     } else {

        //         let formData = new FormData();
        //         formData.append('name', name);
        //         formData.append('image', image);
        //         formData.append('short_des', short_des);

        //         let config = {
        //             headers: {
        //                 'content-type': 'multipart/form-data',
        //             },
        //         }

        //         showLoader();
        //         try {
        //             const response = await axios.post("{{ route('service.create') }}", formData, config);
        //             hideLoader();

        //             if (response.data.status == "success") {
        //                 $("#addModal").modal("hide");
        //                 await getData();
        //                 document.getElementById('save-form').reset();
        //                 successToast(response.data.message);
        //             } else {
        //                 errorToast(response.data.message);
        //             }

        //         } catch (err) {
        //             hideLoader();
        //             errorToast("Something wen't wrong. Please try again later.");
        //         }
        //     }
        // }

        // async function updateService() {
        //     let id = document.getElementById('dataId').value;
        //     let name = document.getElementById('name').value;
        //     let short_des = document.getElementById('shortDes').value;
        //     let image = document.getElementById('image').files[0];

        //     if (name == "") {
        //         errorToast("Please enter a service name.");
        //     } else if (short_des == "") {
        //         errorToast("Please enter a short description.");
        //     } else {

        //         let formData = new FormData();
        //         formData.append('id', id);
        //         formData.append('name', name);
        //         formData.append('image', image);
        //         formData.append('short_des', short_des);

        //         let config = {
        //             headers: {
        //                 'content-type': 'multipart/form-data',
        //             },
        //         }

        //         showLoader();
        //         try {
        //             const response = await axios.post("{{ route('service.update') }}", formData, config);
        //             hideLoader();

        //             if (response.data.status == "success") {
        //                 $("#addModal").modal("hide");
        //                 document.getElementById('save-form').reset();
        //                 await getData();
        //                 successToast(response.data.message);
        //             } else {
        //                 errorToast(response.data.message);
        //             }

        //         } catch (err) {
        //             hideLoader();
        //             errorToast("Something wen't wrong. Please try again later.");
        //         }
        //     }
        // }

        // async function deleteItem() {
        //     let id = $("#deleteId").val();
        //     showLoader();
        //     const response = await axios.post("{{ route('service.delete') }}", {
        //         id: id
        //     });
        //     hideLoader();
        //     if (response.data.status == "success") {
        //         $("#deleteModal").modal("hide");
        //         await getData();
        //         successToast(response.data.message);
        //     } else {
        //         errorToast(response.data.message);
        //     }
        // }
