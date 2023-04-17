
//const W_WIDTH  = window.innerWidth; // ブラウザの横サイズ
//const W_HEIGHT = window.innerHeight;// ブラウザの縦サイズ
const W_WIDTH06 = document
  .getElementById("photo_canvas01_06")
  .getBoundingClientRect().width; //キャンバスの横サイズ
const W_HEIGHT06 = document
  .getElementById("photo_canvas01_06")
  .getBoundingClientRect().width; //キャンバスの横サイズ
const W_ASPECT06 = window.innerWidth / window.innerHeight; // アスペクト比
const W_RATIO06 = window.devicePixelRatio; // ピクセル比
let camera06, scene06, renderer06, cube06
window.onload = () => {
  // 1, カメラを作る
  camera = new THREE.PerspectiveCamera(45, W_ASPECT, 0.1, 1000);
  camera.position.set(0, 0, 60);
  // 2, シーンを作る
  scene = new THREE.Scene();
  scene.background = new THREE.Color(0xcccccc);
  // 3-1, ライトを作る1
  let dirLight = new THREE.DirectionalLight(0xffffff, 1);
  dirLight.position.set(5, 3, 5); // 光の向き
  scene.add(dirLight);
  // 3-2, ライトを作る2
  let ambLight = new THREE.AmbientLight(0xffffff);
  scene.add(ambLight);
  // 4, レンダラーを作る
  const renderer06 = new THREE.WebGLRenderer({
    canvas: document.querySelector("#photo_canvas01_06"),
  });
  renderer06.setPixelRatio(W_RATIO); // ピクセル比
  renderer06.setSize(W_WIDTH, W_HEIGHT);

  // 5, HTMLに配置する
  let div = document.getElementById("photo_canvas01_06");
  div.appendChild(renderer06.domElement);
  // 6, キューブを配置する
  let geometry = new THREE.BoxGeometry(1, 1, 1);
  let material = new THREE.MeshLambertMaterial({ color: 0xcccccc });
  cube = new THREE.Mesh(geometry, material);
  scene.add(cube);
  // 7, アニメーションの開始
  animate();
};

function animate() {
  cube.rotation.x += 0.002; // 立方体を回転
  cube.rotation.y += 0.002;
  cube.rotation.z += 0.002;
  renderer.render(scene, camera); // レンダリング
  requestAnimationFrame(animate); // 更新
}





















