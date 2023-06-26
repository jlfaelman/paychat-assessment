<div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md rounded px-2 py-4 w-[30%]">
        <h1 class="text-2xl font-semibold mb-4">Login</h1>
        <form method="post" id="login">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>

            </div>
        </form>
    </div>
</div>


<script>
    $('#login').on('submit',(e)=>{
        e.preventDefault();
        const id = $('#id').val()
        let data = {
            email:$('#email').val(),
            password:$('#password').val(),
            
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?=  site_url('/auth/submit') ?>",
            data: data,
        }).done(response=>{
            console.log(response)
            if(response.status == "200") window.location.href = "<?= site_url()?>"
        }).fail(err=>{
            console.log(err)
        });
    });
    

</script>