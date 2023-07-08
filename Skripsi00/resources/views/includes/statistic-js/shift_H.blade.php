<!-- SHIFT H -->
<script>
     // ===== H
    let tot_wa_h = <?php echo json_encode($tot_wa_h); ?>;
    let tot_fw_h = <?php echo json_encode($tot_fw_h); ?>;
    let tot_rj_h = <?php echo json_encode($tot_rj_h); ?>;
    let tot_wo_h = <?php echo json_encode($tot_wo_h); ?>;
    let tot_wm_h = <?php echo json_encode($tot_wm_h); ?>;
    let tot_rs_h = <?php echo json_encode($tot_rs_h); ?>;
  
    const labels_H = ['Waiting Approval','Forwarding','Rejected','Working','Waiting Material','Resolved/Normal'];
    // const labels = Utils.months({count: 7});
    const data_H = {
    labels: labels_H,
    datasets: [{
        label: 'SHIFT H',
        data: [tot_wa_h, tot_fw_h, tot_rj_h, tot_wo_h, tot_wm_h, tot_rs_h],
        backgroundColor: [
            '#FFDF6A',
            '#11ABDF',
            '#eb4034',
            '#D876D8',
            '#c9600a',
            '#6EE29F'
        ],
        borderColor: [
            '#FFDF6A',
            '#11ABDF',
            '#eb4034',
            '#D876D8',
            '#c9600a',
            '#6EE29F',
        ],
        color: [
            'red',
            'white',
            'white',
            'white',
        ],
        borderWidth: 1
    }]
};
const config_H = {
    type: 'bar',
    data: data_H,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    },
};
</script>

<script>
    const myChart_H = new Chart(
    document.getElementById('myChart-H'),
    config_H
);
</script>