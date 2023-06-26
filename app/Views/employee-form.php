<div class="flex flex-col p-[2rem]">
<div class="flex justify-between">
        <h1 class="text-2xl">Registration Form</h1>
        <a href="<?= site_url()?>" class="p-2">Back</a>
    </div>
<form method="post" id="employee-form" class="flex flex-col border p-2 m-[1rem] rounded shadow gap-1" >
    <input hidden class="border px-2 shadow rounded "type="text" name="id" id="id" value="<?=(isset($employee)) ? $employee['id'] : ""?>">

    <label for="firstname">Firstname:</label>
    <input class="border px-2 shadow rounded "type="text" name="firstname" id="firstname" required value="<?=(isset($employee)) ? $employee['firstname'] : ""?>">

    <label for="lastname">Lastname:</label>
    <input class="border px-2 shadow rounded "type="text" name="lastname" id="lastname" required value="<?=(isset($employee)) ? $employee['lastname'] : ""?>">

    <label for="email">Email:</label>
    <input class="border px-2 shadow rounded "type="email" name="email" id="email" required value="<?=(isset($employee)) ? $employee['email'] : ""?>">

    <label for="age">Age:</label>
    <input class="border px-2 shadow rounded "type="text" name="age" id="age" required value="<?=(isset($employee)) ? $employee['age'] : ""?>">

    <label for="job_title">Job Title:</label>
    <input class="border px-2 shadow rounded "type="text" name="job_title" id="job_title" required value="<?=(isset($employee)) ? $employee['job_title'] : ""?>">

    <label for="access_level">Access Level:</label>
    <select class="border px-2 shadow rounded "name="access_level" id="access_level" required value="<?=(isset($employee)) ? $employee['access_level_id'] : ""?>">
        <option selected disabled>Select Access Level</option>
        <?php foreach($access_levels as $al): ?>
            <option value="<?= $al['access_level_id']?>" <?=(isset($employee) && $employee['access_level_id'] == $al['access_level_id']) ? "selected" : ""?> ><?= $al['description'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="password">Password:</label>
    <input class="border px-2 shadow rounded "type="password" name="password" id="password" required value="<?=(isset($employee)) ? $employee['password'] : ""?>">

    <label for="birth_date">Birth Date:</label>
    <input class="border px-2 shadow rounded "type="date" name="birth_date" id="birth_date" required value="<?=(isset($employee)) ? $employee['birth_date'] : ""?>">

    <button type="submit" class="bg-green-700 p-1 text-white rounded mt-2 hover:bg-green-800">Submit</button>
</form>


</div>

<script>
    $('#employee-form').on('submit',(e)=>{
        e.preventDefault();
        const id = $('#id').val()
        let data = {
            firstname:$('#firstname').val(),
            lastname:$('#lastname').val(),
            age:$('#age').val(),
            email:$('#email').val(),
            job_title:$('#job_title').val(),
            access_level_id:$('#access_level').val(),
            password:$('#password').val(),
            birth_date:$('#birth_date').val(),
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?=(isset($employee)) ? site_url("/employee/submit/".$employee['id']) : site_url('/employee/submit')?>",
            data: data,
        }).done(response=>{
            if(response.status == "200") window.location.href = "<?= site_url()?>"
        }).fail(err=>{
            console.log(err)
        });
    



       
    })
</script>