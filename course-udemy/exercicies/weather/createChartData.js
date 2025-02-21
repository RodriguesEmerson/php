import createChart from "./chartTemp.js";

const getChartData = {
   data: '',
   getData: function(){
      const hourlyTemp = document.querySelector(".hourly-temp");
      this.data = JSON.parse(hourlyTemp.textContent);
      this.filterData();
   },
   filterData: function(){
      let ind = 0;
      const hourlyTempFiltered = {};
      Object.entries(this.data).forEach(([key, value], index) =>{
         if(index === ind){
            if(Object.entries(hourlyTempFiltered).length >= 8) return;

            const date = new Date(key * 1000);
            const hour = date.getHours();
            hourlyTempFiltered[`${hour}_${index}`] = value;
            ind += 3;
         }
      })
      this.createArrayWhithData(hourlyTempFiltered);
   },

   createArrayWhithData: function(filteredData){
      const labels = [];
      const values = [];
      Object.entries(filteredData).forEach(([key, value], index) => {

         labels.push(this.formatHour(key));
         values.push(`${value.toString().split('.')[0]}`)
      })
      createChart(labels, values)
      
   },

   formatHour: function(time){
      const hour = time.split('_')[0];
      if(hour < 12){
         return `0${hour}:00`;
      }
      return `${hour}:00`;
   }

}

document.addEventListener('DOMContentLoaded', () => {
   getChartData.getData();
})
