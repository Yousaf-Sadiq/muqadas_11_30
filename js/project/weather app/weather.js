
// //  async programming  vs sync programming 
// //  async programming is used when we need to perform multiple tasks at the same time
// let search = document.querySelector("#search");

// search.addEventListener("keyup", function (e) {
//     if (e.key == "Enter") {
//         let val = search.value
//         ApiCall(val)
//     }
// })


// async function ApiCall(dest) {
//     let location = dest;
//     let appId = "7eeb60788fe6228e7a0c173334625e2e";

//     let url = `https://api.openweathermap.org/data/2.5/weather?q=${location}&APPID=${appId}`;

//     let _name = document.querySelector("#name");
//     let img = document.querySelector("#img");

//     let data = await fetch(url);



//     let res = await data.json();
//     console.log(res);

//     _name.innerHTML = res.name


//     let weather_condition = res.weather[0].main;

//     if (weather_condition == "Haze") {
//         img.src = "https://cff2.earth.com/uploads/2018/11/13015448/what-is-haze.jpg"
//     }


//     if (weather_condition == "Smoke") {
//         img.src = "https://i.natgeofe.com/n/5eefcc3a-7564-4b59-8fe0-0555ccb02bf4/GettyImages-1329269761_3x2.jpg"  
//     }
//     // promises accept   


// }


let btn = document.querySelector("#btn");
let search = document.querySelector("#search");

btn.addEventListener("click",function(){
 APICall()
})


async function APICall() {
  let apiKey = "43a4ae518fe69003563bee12073d451e";
  let locations =search.value ;

  let url = `https://api.openweathermap.org/data/2.5/weather?q=${locations}&APPID=${apiKey}`;

  let response = await fetch(url);

  let data = await response.json();


  console.log(data);
  console.log(data.weather[0].description);
  console.log(data.coord.lat);
if (data.weather[0].main == "Clouds") {
 img.src="https://images.unsplash.com/photo-1500740516770-92bd004b996e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZGFyayUyMGNsb3VkeSUyMHNreXxlbnwwfHwwfHx8MA%3D%3D"
}

  let output = "";
  for (const key in data) {
    // output += data[key] +"<br>";

    if (typeof data[key] == "object") {

      for (const childKey in data[key]) {





        if (typeof data[key][childKey] == "object") {



          for (const subChildKey in data[key][childKey]) {
            output += `${key} => ${childKey} => ${subChildKey} : ${data[key][childKey][subChildKey]} <br>`;
          }



        } else {
          output += `${key} => ${childKey} : ${data[key][childKey]} <br>`;
        }
      }



    } else {
      output += `${key} : ${data[key]} <br>`;
    }
  }


  
  result.innerHTML=output;
}