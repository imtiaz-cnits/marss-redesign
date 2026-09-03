// Global App Configuration & Authentication Helpers

export function showLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.remove('d-none', 'hidden');
    }
}

export function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.add('d-none', 'hidden');
    }
}

export function successToast(msg) {
    if (typeof Toastify === 'function') {
        Toastify({
            gravity: "bottom",
            position: "center",
            text: msg,
            className: "mb-5",
            style: {
                background: "#16a34a",
            }
        }).showToast();
    } else {
        console.log('SUCCESS:', msg);
    }
}

export function errorToast(msg) {
    if (typeof Toastify === 'function') {
        Toastify({
            gravity: "bottom",
            position: "center",
            text: msg,
            className: "mb-5",
            style: {
                background: "#dc2626",
            }
        }).showToast();
    } else {
        console.error('ERROR:', msg);
    }
}

let logoutTimer;

export function startLogoutTimer() {
    if (logoutTimer) {
        clearTimeout(logoutTimer);
    }
    logoutTimer = setTimeout(logout, 43200000); // 12 hours in ms
}

export function resetLogoutTimer() {
    startLogoutTimer();
}

export function logout() {
    localStorage.clear();
    sessionStorage.clear();
    window.location.href = "/nexus-login-page";
}

export function unauthorized(code) {
    if (code === 401) {
        localStorage.clear();
        sessionStorage.clear();
        window.location.href = "/nexus-login-page";
    }
}

export function setToken(token) {
    localStorage.setItem("token", `Bearer ${token}`);
}

export function getToken() {
    return localStorage.getItem("token");
}

export function HeaderToken() {
    let token = getToken();
    startLogoutTimer();
    return {
        headers: {
            Authorization: token
        }
    };
}

export function HeaderTokenWithBlob() {
    let token = getToken();
    startLogoutTimer();
    return {
        responseType: 'blob',
        headers: {
            Authorization: token
        }
    };
}

// Global Activity Listeners for Session Timeout Reset
if (typeof window !== 'undefined') {
    window.addEventListener("mousemove", resetLogoutTimer);
    window.addEventListener("keypress", resetLogoutTimer);
}
