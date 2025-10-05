document.querySelectorAll(".btn_approve").forEach((button) => {
    console.log(button);
    button.addEventListener("click", (e) => {
        let user_id = e.target.dataset.id;
        Swal.fire({
            title: "Approve",
            text: "Do you want to continue",
            showCancelButton: true,
            confirmButtonText: "ok",
        }).then((res) => {
            if (res.isConfirmed) {
                axios
                    .post(`/approve-student/${user_id}`)
                    .then((res) => {
                        Swal.fire({
                            title: "success",
                            text: res.data.message,
                            icon: "success",
                            confirmButtonText: "ok",
                        }).then((res) => {
                            if (res.isConfirmed) {
                                location.reload();
                            }
                        });
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });
            }
        });
    });
});
