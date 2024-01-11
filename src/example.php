<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .star {
            cursor: pointer; /* クリックできるような表示にする */
            font-size: 18px;
        }
    </style>
    <title>５段階評価</title>
</head>
<body>
    <div id="stars">
        <span class="star" data-star="1">☆</span>
        <span class="star" data-star="2">☆</span>
        <span class="star" data-star="3">☆</span>
        <span class="star" data-star="4">☆</span>
        <span class="star" data-star="5">☆</span>
    </div>
    <script>
        const stars =  document.getElementsByClassName('star');

        // 星マークにマウスオーバーした時のイベント
        const starMouseover = (e) => {
            const index = Number(e.toElement.getAttribute('data-star'));
            for(let j=0; j < index; j++) {
                stars[j].textContent = '★';
            }
        }

        // 星マークからマウスが離れた時のイベント
        const starMouseout = (e) => {
            for (let j=0; j < stars.length; j++) {
                stars[j].textContent = '☆';
            }
        }

        for (let i=0; i < stars.length; i++) {
            stars[i].addEventListener('mouseover', starMouseover);
            stars[i].addEventListener('mouseout',starMouseout);

            // 星マークをクリックした時のイベント
            stars[i].addEventListener('click', e => {
                for (let j=0; j < stars.length; j++) {
                    stars[j].textContent = '☆';
                }
                const index = Number(e.toElement.getAttribute('data-star'));
                for(let j=0; j<index; j++) {
                    stars[j].textContent = '★';
                }
                // マウスオーバーとマウスアウトのイベント解除
                for(let j=0; j<stars.length; j++) {
                    stars[j].removeEventListener('mouseover', starMouseover);
                    stars[j].removeEventListener('mouseout', starMouseout);
                }

                // // 非同期通信で情報をサーバーサイドに送信する
                // let data = new URLSearchParams();
                // data.append('star',index);
                // fetch('abcde', {
                //     method:'post',
                //     body: data
                // }).then()
                // .catch();

            });
        }
       
    </script>
</body>

</html>