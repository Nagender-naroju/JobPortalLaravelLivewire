<div class="card border-0 shadow mb-4 mt-4">
    <div class="card-header">Users Management</div>
    <div class="card-body p-4">
        <table class="table">
            <thead class="bg-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @for ($i = 0; $i < 5; $i++)
                    <tr class="active">
                        <th>
                            <div class="placeholder-glow">
                                <span class="placeholder" style="width: 20px;"></span>
                            </div>
                        </th>
                        <td>
                            <div class="placeholder-glow">
                                <span class="placeholder col-8"></span>
                            </div>
                        </td>
                        <td>
                            <div class="placeholder-glow">
                                <span class="placeholder col-10"></span>
                            </div>
                        </td>
                        <td>
                            <div class="placeholder-glow">
                                <span class="placeholder col-6"></span>
                            </div>
                        </td>
                        <td>
                            <div class="placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                        </td>
                        <td>
                            <div class="placeholder-glow">
                                <span class="placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></span>
                            </div>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
