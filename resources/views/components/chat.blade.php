<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    # Modern Chat Page (Laravel + TailwindCSS)

```blade
<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Chats</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            Chat with your users in real time
        </flux:subheading>

        <flux:separator variant="subtle" />
    </div>

    <div class="flex h-[650px] w-full overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">

        <!-- SIDEBAR -->
        <div class="w-[320px] border-r border-neutral-200 dark:border-neutral-800 flex flex-col">

            <!-- SEARCH -->
            <div class="p-4 border-b border-neutral-200 dark:border-neutral-800">
                <input
                    type="text"
                    placeholder="Search users..."
                    class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white"
                />
            </div>

            <!-- USERS -->
            <div class="flex-1 overflow-y-auto">

                <!-- USER ITEM -->
                <button class="w-full border-b border-neutral-100 dark:border-neutral-800 p-4 text-left hover:bg-neutral-100 dark:hover:bg-neutral-800 transition">
                    <div class="flex items-center gap-3">

                        <!-- AVATAR -->
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                            A
                        </div>

                        <!-- USER INFO -->
                        <div class="flex-1 overflow-hidden">
                            <div class="flex items-center justify-between">
                                <h3 class="truncate font-semibold text-neutral-900 dark:text-white">
                                    Asma
                                </h3>

                                <span class="text-xs text-neutral-500">
                                    2m
                                </span>
                            </div>

                            <p class="truncate text-sm text-neutral-500">
                                Hello how are you?
                            </p>
                        </div>
                    </div>
                </button>


                <!-- USER ITEM -->
                <button class="w-full border-b border-neutral-100 dark:border-neutral-800 p-4 text-left hover:bg-neutral-100 dark:hover:bg-neutral-800 transition">
                    <div class="flex items-center gap-3">

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-pink-500 text-white font-bold">
                            T
                        </div>

                        <div class="flex-1 overflow-hidden">
                            <div class="flex items-center justify-between">
                                <h3 class="truncate font-semibold text-neutral-900 dark:text-white">
                                    Test User
                                </h3>

                                <span class="text-xs text-neutral-500">
                                    5m
                                </span>
                            </div>

                            <p class="truncate text-sm text-neutral-500">
                                New message...
                            </p>
                        </div>
                    </div>
                </button>
            </div>
        </div>


        <!-- CHAT AREA -->
        <div class="flex flex-1 flex-col">

            <!-- CHAT HEADER -->
            <div class="flex items-center justify-between border-b border-neutral-200 dark:border-neutral-800 px-6 py-4">

                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                        A
                    </div>

                    <div>
                        <h2 class="font-semibold text-neutral-900 dark:text-white">
                            Asma
                        </h2>

                        <p class="text-sm text-green-500">
                            Online
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button class="rounded-xl p-2 hover:bg-neutral-100 dark:hover:bg-neutral-800">
                        📞
                    </button>

                    <button class="rounded-xl p-2 hover:bg-neutral-100 dark:hover:bg-neutral-800">
                        🎥
                    </button>
                </div>
            </div>


            <!-- MESSAGES -->
            <div class="flex-1 overflow-y-auto bg-neutral-50 p-6 dark:bg-neutral-950">

                <div class="space-y-4">

                    <!-- RECEIVED MESSAGE -->
                    <div class="flex items-start gap-2">
                        <div class="max-w-[70%] rounded-2xl rounded-tl-sm bg-white px-4 py-3 shadow dark:bg-neutral-800 dark:text-white">
                            Hello 👋
                        </div>
                    </div>


                    <!-- SENT MESSAGE -->
                    <div class="flex justify-end">
                        <div class="max-w-[70%] rounded-2xl rounded-br-sm bg-blue-500 px-4 py-3 text-white shadow">
                            Hi, welcome to my chat app 🚀
                        </div>
                    </div>


                    <!-- RECEIVED MESSAGE -->
                    <div class="flex items-start gap-2">
                        <div class="max-w-[70%] rounded-2xl rounded-tl-sm bg-white px-4 py-3 shadow dark:bg-neutral-800 dark:text-white">
                            This UI looks amazing.
                        </div>
                    </div>
                </div>
            </div>


            <!-- MESSAGE INPUT -->
            <div class="border-t border-neutral-200 bg-white p-4 dark:border-neutral-800 dark:bg-neutral-900">

                <form class="flex items-center gap-3">

                    <input
                        type="text"
                        placeholder="Type a message..."
                        class="flex-1 rounded-2xl border border-neutral-300 bg-neutral-100 px-5 py-3 outline-none focus:ring-2 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white"
                    />

                    <button
                        type="submit"
                        class="rounded-2xl bg-blue-500 px-6 py-3 font-medium text-white transition hover:bg-blue-600"
                    >
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>