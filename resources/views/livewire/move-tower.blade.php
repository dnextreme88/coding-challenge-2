<div
    x-init="
        const towers = document.querySelectorAll('.tower');
        let currentTower;
        let originTower;

        let towerContent = [[], [], []] // Represents the discs on each tower
        let size = 3; // Initialize the size of the discs
        let discs;
        const discColors = ['#D8BFD8', '#00FF7F', '#98FB98'];
        const startWidth = 75; // Initial width

        initializeTowers();

        function initializeTowers() {
            towerContent = [[], [], []];

            // Create discs and place them on the first tower
            for (let i = 0; i < size; i++) {
                let tower = document.createElement('div');
                tower.classList.add('disc');
                tower.draggable = true;
                tower.style.backgroundColor = discColors[i];
                tower.style.width = (startWidth - 15 * i) + 'px';
                towerContent[0].push(tower);
            }

            // Add the disc to the first tower in the DOM
            towerContent[0].forEach(t => towers[0].innerHTML = t.outerHTML + towers[0].innerHTML);

            // Add event listeners to each tower
            for (let i = 0; i < towers.length; i++) {
                towers[i].addEventListener('dragenter', function() {
                    if (!originTower) {
                        originTower = this;
                    }
                });

                towers[i].addEventListener('dragover', function() {
                    currentTower = this;
                });
            }

            discs = document.querySelectorAll('.disc'); // Get all discs

            discs.forEach(disc => {
                disc.addEventListener('dragstart', function() {
                    this.classList.add('opacity-50');
                });

                disc.addEventListener('dragend', function() {
                    let originTowerIndex = originTower.classList[originTower.classList.length - 1][1]
                    let currentTowerIndex = currentTower.classList[currentTower.classList.length - 1][1]
                    this.classList.remove('opacity-50');

                    moveTower(originTowerIndex, currentTowerIndex, this)

                    originTower = undefined;
                    originTowerIndex = undefined;
                });
            })
        }

        // Move the disc from the origin tower to the current tower
        function moveTower(originTowerIndex, currentTowerIndex, disc) {
            // Check if the disc is on top of the origin tower
            let size = towerContent[originTowerIndex].length;
            const isDiscOnTopOfOriginTower = disc.style.width === towerContent[originTowerIndex][size - 1].style.width;

            let isCurrentDiscSmallerThanTopOfCurrentTower = isDiscLessThan(currentTowerIndex, disc);

            // Place disc from origin to designated tower
            if (isDiscOnTopOfOriginTower && isCurrentDiscSmallerThanTopOfCurrentTower) {
                towerContent[currentTowerIndex].push(towerContent[originTowerIndex].pop());
                originTower.removeChild(disc);
                currentTower.prepend(disc);
            }
        }

        // Check if the disc is smaller than the top disc of the current tower
        function isDiscLessThan(currentTowerIndex, disc) {
            let size = towerContent[currentTowerIndex].length

            if (!towerContent[currentTowerIndex][size - 1]) {
                return true;
            } else {
                let sizeTop = disc.style.width.substring(0, disc.style.width.indexOf('p'))
                let sizeBottom = towerContent[currentTowerIndex][size - 1].style.width.substring(0, towerContent[currentTowerIndex][size - 1].style.width.indexOf('p'));

                return Number(sizeTop) < Number(sizeBottom);
            }
        }
    "
    class="mt-4"
>
    <h1 class="text-2xl dark:text-gray-200">Coding Challenge 2</h1>

    <p class="mt-4 text-xl dark:text-gray-200">Challenge: Object of the game is to move all the disks over to Tower 3 (with your mouse). But you cannot place a larger disk onto a smaller disk.</p>

    <div class="flex items-center justify-around h-48 gap-3 p-4 my-6 rounded-md bg-sky-300 dark:bg-sky-900 stage">
        <div class="flex flex-col items-center justify-end h-40 w-28 tower t0">
            <div class="absolute h-32 w-2 bg-red-700 rounded-md stem"></div>
            <div class="z-10 h-2 w-24 bg-red-700 rounded-lg plate"></div>
        </div>
        <div class="flex flex-col items-center justify-end h-40 w-28 tower t1">
            <div class="absolute h-32 w-2 bg-red-700 rounded-md stem"></div>
            <div class="z-10 h-2 w-24 bg-red-700 rounded-lg plate"></div>
        </div>
        <div class="flex flex-col items-center justify-end h-40 w-28 tower t2">
            <div class="absolute h-32 w-2 bg-red-700 rounded-md stem"></div>
            <div class="z-10 h-2 w-24 bg-red-700 rounded-lg plate"></div>
        </div>
    </div>
</div>
