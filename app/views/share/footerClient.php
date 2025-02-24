    <!--footer  -->
    <div class="footer">
      <div class="contain">
        <div class="footer__inner">
          <div class="footer__list">
            <h3 class="footer__copany">CÔNG TY THỰC PHẨM KEM CHAY DELY</h3>
            <p class="footer__item">
              <strong>Văn phòng: </strong> Địa chỉ quán
            </p>
            <p class="footer__item">
              <strong>Hotline: </strong> 0348202796
            </p>
            <p class="footer__item">
              <strong>Gmail: </strong> khenh@gmail.com
            </p>
          </div>
          <div class="footer__list">
            <h3 class="footer__heading">Mạng xã hội</h3>
            <p class="footer__item"><strong>facebook:</strong> kieudung</p>
            <p class="footer__item"><strong>Instagram:</strong> kieudung</p>
            <p class="footer__item"><strong>Tiktok:</strong> kieudung</p>
            
          </div>
          <div class="footer__list">
            <p class="footer__heading">
              Đăng ký nhận khuyến mãi
            </p>
            <p class="footer__item">
            Nhập địa chỉ email của bạn cho danh sách gửi thư của chúng tôi để giữ cho bản thân cập nhật
            </p>
            <input type="text" name="" id="">
            <div class="footer__item">
              <iframe class="footer__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0295177960065!2d106.66234937408943!3d10.809051089341695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752985530397f1%3A0x5865c646125f8050!2zQ8ahIHPhu58gVHLGsOG7nW5nIFPGoW4gLSBUcsaw4budbmcgxJDhuqFpIGjhu41jIE5nb-G6oWkgbmfhu68gLSBUaW4gaOG7jWMgVFAuIEjhu5MgQ2jDrSBNaW5oIChIVUZMSVQp!5e0!3m2!1svi!2s!4v1730785582601!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="footer__copy">
          <p class="footer__cpr">
            Development by MinhLe 
          </p>
        </div>
      </div>
     </div>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const authButtons = document.getElementById('auth-buttons');
    const token = localStorage.getItem('jwtToken');
    const username = localStorage.getItem('username');

    console.log('Token', token);
    console.log('Username', username); 

    if (token && username) {
        // User đã đăng nhập
        authButtons.innerHTML = `
            <div class="dropdown">
                
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/webbanhang/profile">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="/webbanhang/order/history">Lịch sử đơn hàng</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" onclick="logout()">Đăng xuất</a></li>
                </ul>
            </div>
        `;
    } else {
        // User chưa đăng nhập
        authButtons.innerHTML = `
            <a class="action-link" href="/webbanhang/account/login">Sign in</a>
            <a class="btn action-btn" href="/webbanhang/account/register">Sign up</a>
        `;
    }
});

function logout() {
    localStorage.removeItem('jwtToken');
    localStorage.removeItem('username');
    localStorage.removeItem('role');
    window.location.href = '/webbanhang/home';
}
</script>
</html>