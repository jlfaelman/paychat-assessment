    
    <div class="flex flex-col p-[2rem]">
        <div class="container mx-auto border p-2 shadow ">
            <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Employee Table</h1>
            <a  href="/add"  class=" text-green-700 px-2 font-semibold ">Add</a>
            </div>
            
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Age</th>
                        <th class="px-4 py-2">Birth Date</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Job Title</th>
                        <th class="px-4 py-2">Date Created</th>
                        <th class="px-4 py-2">Date Modified</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $emp): ?>
                        <tr>
                            <td class="text-center"><?= $emp['firstname'] ?> <?= $emp['lastname'] ?></td>
                            <td class="text-center"><?= $emp['age'] ?></td>
                            <td class="text-center"><?= $emp['birth_date'] ?></td>
                            <td class="text-center"><?= $emp['email'] ?></td>
                            <td class="text-center"><?= $emp['job_title'] ?></td>
                            <td class="text-center"><?= $emp['date_created'] ?></td>
                            <td class="text-center"><?= $emp['date_modified'] ?></td>
                            <td class="text-center">
                                <div class="flex gap-2">
                                    <a href="/edit/<?=$emp['id']?>" class="bg-blue-600 hover:bg-blue-800  rounded shadow text-white px-2 py-1">Edit</a>
                                    <a href="/delete/<?=$emp['id']?>"  class="bg-red-600 hover:bg-red-800 rounded shadow text-white px-2 py-1">Remove</a>
                                </div>
                            </td>

                        </tr>
    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<script>
  
</script>