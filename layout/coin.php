<style>
    

    div.coin-container {
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }



    #coin {
        position: relative;
        width: 10rem;
        height: 10rem;
        margin: 10px 0rem;
        transform-style: preserve-3d;

    }

    #coin div {
        width: 100%;
        height: 100%;
        border: 2px solid black;
        border-radius: 50%;
        backface-visibility: hidden;
        background-size: contain;
        position: absolute;
    }

    .heads {
        background-image: url("../../public/coin/head.webp");
    }

    .animate-heads {
        animation: flipHeads 30s;
        animation-fill-mode: forwards;
    }

    @keyframes flipHeads {
        from {
            transform: rotateY(0deg);
        }

        to {
            transform: rotateY(9000deg);
        }
    }

    .tails {
        background-image: url("../../public/coin/tail.webp");
        transform: rotateY(-180deg);
    }

    .animate-tails {
        animation: flipTails 30s;
        animation-fill-mode: forwards;
    }

    @keyframes flipTails {
        from {
            transform: rotateY(0deg);
        }

        to {
            transform: rotateY(8820deg);
        }
    }
</style>

<div class='coin-container'>
    <div id="coin" class=''>
        <div id="heads" class="heads"></div>
        <div id="tails" class="tails"></div>
    </div>
    <p>Heads: <span id="headsCount">0</span> Tails: <span id="tailsCount">0</span></p>
    <p><span id="status"></span></p>
</div>


<script>
    const coin = document.querySelector('#coin');
    const button = document.querySelector('#flip');
    const status = document.querySelector('#status');
    const heads = document.querySelector('#headsCount');
    const tails = document.querySelector('#tailsCount');

    let headsCount = 0;
    let tailsCount = 0;


    function deferFn(callback, ms) {
        setTimeout(callback, ms);
    }

    function processResult(result) {
        if (result === 'heads') {
            headsCount++;
            heads.innerText = headsCount;
        } else {
            tailsCount++;
            tails.innerText = tailsCount;
        }
        status.innerText = result.toUpperCase();
        flipCoin();
    }

    function flipCoin() {
        coin.setAttribute('class', '');
        const random = Math.random();
        const result = random < 0.5 ? 'heads' : 'tails';
        deferFn(function () {
            coin.setAttribute('class', 'animate-' + result);
            deferFn(processResult.bind(null, result), 29000);
        }, 1000);
    }

    // button.addEventListener('click', flipCoin);
    flipCoin();


</script>