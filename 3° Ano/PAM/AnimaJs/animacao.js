document.addEventListener("DOMContentLoaded", ()=>{
    const square = document.getElementById("square")
    const container = document.getElementById("animation-container")
    const containerWidth = container.clientWidth
    let position = 0
    let direction = 1

    function animate(){
        position += direction*5
        square.style.left = position + "px"
        if(position<=0 || position>=containerWidth-square.clientWidth){
            direction *= -1
            square.style.backgroundColor = getRandomColor()
        }
        requestAnimationFrame(animate)

        function getRandomColor(){
            const letters = '0123456789ABCDEF'
            let color = '#'
            for(let i=0; i<6; i++){
                color += letters[Math.floor(Math.random()*16)]
            }
            return color
        }
        
    }
    animate()
})