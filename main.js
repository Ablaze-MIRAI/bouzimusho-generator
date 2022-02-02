const canvas = document.getElementById("canvas");
const short = document.getElementById("short");
const shortFont = document.getElementById("shortFont");
const shortTextbox = document.getElementById("shortTextbox");
const namebox = document.getElementById("namebox");
const nameTextbox = document.getElementById("nameTextbox");
const btn = document.getElementById("btn");

btn.onclick = () =>{
    html2canvas(canvas).then(canvas => {
        const a = document.createElement("a");
        a.href = canvas.toDataURL("image/png", .85);
        a.download = `${Math.floor((new Date()).getTime() / 1000)}.png`;
        a.click();
    });
};

shortTextbox.oninput = () =>{
    short.innerText = shortTextbox.value;
}

nameTextbox.oninput = () =>{
    namebox.innerText = nameTextbox.value;
}