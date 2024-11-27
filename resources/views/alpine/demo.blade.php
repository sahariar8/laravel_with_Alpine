<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @Vite(['resources/js/app.js'])
</head>
<body>
<div x-data="{message:'I want to quit'}">
    <p x-text="message"></p>
    When there is no desire, all things are at peace. - Laozi
</div>
</body>
</html> -->

@Vite(['resources/js/app.js'])
<!-- <div x-data="persons">
    <p x-text="name"></p>
    <p x-text="email"></p>
    <p x-text="book"></p>

    When there is no desire, all things are at peace. - Laozi
</div> -->


<div x-data="data">
    <template x-for="person in persons" :key="person . email">
        <li x-text="`${person.name}-${person.email}`"></li>
    </template>
</div>

<div x-data="data1">
    <button @click="toggle()">open/close</button>
    <div x-show="open">
        <div class="text-red-400 border rounded-full bg-amber-200">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, accusamus?</p>
        </div>
    </div>
</div>

<script>
    const data = {
        persons: [
            { name: 'sahariar', email: 'sahariar@gmail.com', hobby: 'reading' },
            { name: 'alam', email: 'alam@gmail.com', hobby: 'writing' },
            { name: 'nishad', email: 'nishad@gmail.com', hobby: 'singing' },
            { name: 'shuvo', email: 'shuvo@gmail.com', hobby: 'story telling' },
        ]
    }

    const data1 = {
        open: false,
        toggle() {
            this.open = !this.open
        }
    }
</script>