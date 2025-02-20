// import createChart from "./chart";

const getChartData = {
   data: '',
   
   getData: async function(){
      console.log('Delta');
      // createChart();
      const self = this; // Referência segura
      await fetch('inc/functions/chartData.php')
         .then(response => {
            if (!response.ok) {
               throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json()
         })
         .then(datas => {
            self.data = datas;
            console.log(this.data);
         })
         .catch(error => console.log(error));
   }
}

document.addEventListener('DOMContentLoaded', () => {
   getChartData.getData();
})