var app = new Vue({
  el: '#app',
  data: {
    scanner: null,
    activeCameraId: null,
    cameras: [],
    scans: []
  },
  mounted: function () {
    var self = this;
    self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
    self.scanner.addListener('scan', function (content, image) {
      self.scans.unshift({ date: +(Date.now()), content: content });
      $(".cameraParaQrCode").addClass("hidden");
      $(".formularioDeCadastroDePontos").removeClass("hidden");
      
      var telaAtiva = angular.element(document.getElementById('telaResgateBonus')).scope().abaCadastroPonto;
      
      if(telaAtiva){
        $("#cpf_code").val(content);
        $("#cpf_code").trigger('input');
        $("#cpf_code").trigger('change');
      }else{
        $("#cupom_code").val(content);
        $("#cupom_code").trigger('input');
        $("#cupom_code").trigger('change');
      }
      
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      self.cameras = cameras;
      if (cameras.length > 0) {
        
        if(cameras.length > 1){
          self.activeCameraId = cameras[1].id;
          self.scanner.start(cameras[1]);
        }else{
          self.activeCameraId = cameras[0].id;
          self.scanner.start(cameras[0]);
        }
        
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
  },
  methods: {
    formatName: function (name) {
      return name || '(unknown)';
    },
    selectCamera: function (camera) {
      this.activeCameraId = camera.id;
      this.scanner.start(camera);
    }
  }
});
