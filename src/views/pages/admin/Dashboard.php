<?php
$tableHeaderStyles = 'p-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider';
$tableRowStyles = 'p-2 text-sm text-gray-700 whitespace-nowrap';
?>

<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div class="bg-white p-6 rounded shadow-sm text-center">
        <h2 class="text-lg font-semibold text-gray-800">Total Applicants</h2>
        <p><?= count($applicants) ?></p>
    </div>
    <div class="bg-white p-6 rounded shadow-sm text-center">
        <h2 class="text-lg font-semibold text-gray-800">Total Amount Raised</h2>
    </div>
</div>

<div class="mx-auto p-4 p-2">
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="bg-white min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="<?= $tableHeaderStyles?>">User ID</th>
                    <th class="<?= $tableHeaderStyles ?>">Name</th>
                    <th class="<?= $tableHeaderStyles ?>">Phone</th>
                    <th class="<?= $tableHeaderStyles ?>">Email</th>
                    <th class="<?= $tableHeaderStyles ?>">School</th>
                    <th class="<?= $tableHeaderStyles ?>">Speciality</th>
                    <th class="<?= $tableHeaderStyles ?>">Referral</th>
                    <th class="<?= $tableHeaderStyles ?>">Comments</th>
                    <th class="<?= $tableHeaderStyles ?>">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Example Row -->
                <?php foreach ($applicants as $applicant) { ?>
                <tr class="hover:bg-gray-50">
                    <td class="<?= $tableRowStyles ?>"><?php echo $applicant->id ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->fullname ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->phone ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->email ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->school ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->speciality ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->referral ?></td>
                    <td class="<?= $tableRowStyles ?>"><?= $applicant->comments ?></td>
                    <td>
                        <button
                            class="text-sm text-gray-500 rounded-md hover:text-gray-600 p-1 bg-white border border-gray-300"
                            onclick="viewRow('12345')"
                            title="View"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </button>
                        <button
                            class="px-3 py-1 text-sm text-white bg-red-500 rounded-md hover:bg-red-600"
                            onclick="deleteRow('12345')"
                            title="Delete"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4" data-icon="icon-trash" fill="currentColor">
                                <path d="M135.2 17.7C140.5 7.1 150.9 0 162.4 0h123.2c11.5 0 21.9 7.1 27.2 17.7L328 32H432c8.8 0 16 7.2 16 16s-7.2 16-16 16H416l-21.2 339.2c-1.6 25.8-23.1 44.8-48.9 44.8H102.1c-25.8 0-47.3-19-48.9-44.8L32 64H16C7.2 64 0 56.8 0 48s7.2-16 16-16H120L135.2 17.7zM64.4 448c.6 9.6 8.6 16 17.7 16H365.9c9.1 0 17.1-6.4 17.7-16L404.4 64H43.6L64.4 448zM192 160c8.8 0 16 7.2 16 16v192c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16zm64 0c8.8 0 16 7.2 16 16v192c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16zm64 0c8.8 0 16 7.2 16 16v192c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16z"/>
                            </svg>
                        </button>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
