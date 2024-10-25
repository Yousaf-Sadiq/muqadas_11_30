<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

<script>
    let logout = document.querySelector("#logout");

    logout.addEventListener("click", async function () {

        let url = "<?php echo LOGOUT ?>";
        let data = await fetch(url);
        let res = await data.json();


        if (res.error > 0) {

            for (const key in res.msg) {
                alertMsg(res.msg[key], "danger", "error")
            }
        } else {

            alertMsg(res.msg, "success", "error")

            // insert_form.reset()
            setTimeout(() => {
                location.href = "<?php echo lOGIN ?>";
            }, 1000);

        }
    })



    // Add event listener to the button
    function alertMsg(msg, classes, id) {

        const alertPlaceholder = document.getElementById(id)


        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)

            wrapper.style.transition = "all 0.75s ease-in-out";

            setTimeout(() => {
                wrapper.style.opacity = 0;

                setTimeout(() => {
                    wrapper.remove();
                }, 1000);
            }, 1300);

        }

        appendAlert(msg, classes)
    }
</script>
</body>

</html>