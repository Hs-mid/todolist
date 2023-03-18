let btn = document.getElementById('create')



btn.addEventListener('click', function () {
    let input1 = document.querySelector('#text')
    let input2 = document.querySelector('#date')

    let text = input1.value
    let date = input2.value
    if (text != "" && date != '') {
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "insert.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("text=" + text + "&date=" + date)
        fetch_data()
    }

    input1.value = ''
    input2.value = ''
})




function fetch_data() {


    let xhr2 = new XMLHttpRequest()
    xhr2.open('GET', 'get_last_data.php', true)
    xhr2.onload = function () {
        if (this.status == 200) {
            const data = JSON.parse(this.responseText)

            content = document.querySelector('.table-content').innerHTML += `
                <tr>
                    <td>${data.mission}</td>
                    <td>${data.date}</td>
                    <td><button class='btn btn-danger' onclick='remove(${data.id})'>delete</button></td>
                </tr>
            `
        }
    }
    xhr2.send()
}

function remove(id) {
    let content = document.querySelector('.table-content')
    let table = ''
    let xhr3 = new XMLHttpRequest()
    xhr3.open('POST', 'delete.php', true);
    xhr3.onload = function () {
        if (this.status == 200) {
            const data = JSON.parse(this.responseText)
            for (var i = 0; i < data.length; i++) {
                table += `
                <tr>
                    <td>${data[i].mission}</td>
                    <td>${data[i].date}</td>
                    <td><button class='btn btn-danger' onclick='remove(${data[i].id})'>delete</button></td>
                </tr>
                `
            }
            content.innerHTML=table

        }
    }
    xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr3.send('id=' + id)
}

