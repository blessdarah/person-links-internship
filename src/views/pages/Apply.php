<?php

declare(strict_types=1);

@session_start();

$errors = $_SESSION['errors'] ?? [];
$formData = $_SESSION['formData'] ?? [];
function hasError(string $key)
{
    return isset($errors[$key]) && !empty($errors[$key]);
}
?>


<main>
    <header class="p-6 max-w-xl mx-auto mt-8 lg:mt-16">
        <h1 class="text-3xl text-center font-bold">Start application</h1>
        <p class="text-gray-500 text-center">Fill the application form below.</p>
    </header>
    <form action="/apply" method="POST" class="mt-4 grid md:grid-cols-2 gap-4 space-y-6 bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
        <div class="flex flex-col">
            <label for="fullname" class="text-sm font-medium text-gray-700 mb-1">Full Name:</label>
            <input type="text"
                id="fullname"
                name="fullname" required class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter your full name"
                value="<?= $formData['fullname'] ?? '' ?>"
            >
            <?php if (hasError("fullname")) : ?>
                <p class="text-sm text-red-600 mt-2"><?= $errors['fullname'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="school" class="text-sm font-medium text-gray-700 mb-1">School</label>
            <input type="text"
                id="school"
                name="school"
                id="school"
                required
                class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter your school"
                value="<?= $formData['school'] ?? '' ?>"
            >
            <?php if (hasError("school")) : ?>
                <p class="text-sm text-red-600 mt-2"><?= $errors['school'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="email" class="text-sm font-medium text-gray-700 mb-1">Email:</label>
            <input type="email"
                id="email"
                name="email"
                required
                class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter your email"
                value="<?= $formData['email'] ?? '' ?>"
            >
            <?php if (hasError("email")) : ?>
                <p class="text-sm text-red-600 mt-2"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="phone" class="text-sm font-medium text-gray-700 mb-1">Phone:</label>
            <input type="tel"
                id="phone"
                name="phone"
                required
                class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter your phone number"
                value="<?= $formData['phone'] ?? '' ?>"
            >
            <?php if (hasError("phone")) : ?>
                <p class="text-sm text-red-600 mt-2"><?= $errors['phone'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="speciality" class="text-sm font-medium text-gray-700 mb-1">Speciality:</label>
            <input type="text"
                id="speciality"
                name="speciality"
                required
                class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter your speciality"
                value="<?= $formData['speciality'] ?? '' ?>"
            >
            <?php if (hasError("speciality")) : ?>
                <p><?= $errors['speciality'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="referral" class="text-sm font-medium text-gray-700 mb-1">Referral:</label>
            <input type="text"
                id="referral"
                name="referral"
                class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter referral (if any)"
                value="<?= $formData['referral'] ?? '' ?>"
            >
            <?php if (hasError("referral")) : ?>
                <p class="text-sm text-red-600 mt-2"><?= $errors['referral'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex flex-col md:col-span-2">
            <label for="comments" class="text-sm font-medium text-gray-700 mb-1">Comments:</label>
            <textarea
                id="comments"
                name="comments"
                class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                placeholder="Enter additional comments"
                rows="4"><?= $formData['comments'] ?? '' ?></textarea>
            <?php if (hasError("comments")) : ?>
                <p class="text-sm text-red-600 mt-2"><?= $errors['comments'] ?></p>
            <?php endif; ?>
        </div>
        <button
            type="submit"
            class="w-full bg-yellow-500 text-white font-medium py-2 px-4 rounded-md hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
            Submit
        </button>
    </form>
</main>
