<?php
function getRandomAvatarLink()
{
    $hash = md5(uniqid(rand(), true));

    return 'https://www.gravatar.com/avatar/'.$hash;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | <?= $title ?? 'Dashboard' ?></title>
    <meta name="description" content="<?= $description ?? 'Admin Dashboard' ?>">
    <!-- Add Heroicons link -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/@heroicons/react@2.0.18/heroicons.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-50">
  <!-- Top Navigation -->
  <header class="flex items-center justify-between px-6 py-4 border-b bg-white">
    <div class="flex items-center space-x-6">
      <div class="text-xl font-bold text-yellow-700">Logo</div>
      <nav class="flex space-x-4 text-yellow-600 font-medium">
        <a href="#" class="hover:underline">Dashboard</a>
        <a href="#" class="hover:underline">Applicants</a>
      </nav>
    </div>
<div class="relative inline-block">
    <!-- Profile Avatar -->
    <div class="w-10 h-10 rounded-full border-2 border-yellow-500 cursor-pointer" id="profile-avatar">
<img src="<?= getRandomAvatarLink() ?>" alt="Profile" class="w-full h-full rounded-full object-cover">

    </div>

    <!-- Dropdown Menu -->
    <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
        <a href="/settings" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
        <a href="/logout" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
    </div>
</div>
  </header>

  <!-- Main Content -->
  <main class="px-6 py-6 space-y-6">

    <?php echo $content; ?>

  </main>
<script>
    // JavaScript to toggle the dropdown menu
    const avatar = document.getElementById('profile-avatar');
    const dropdown = document.getElementById('dropdown-menu');

    avatar.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    // Optional: Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
</body>
</html>
