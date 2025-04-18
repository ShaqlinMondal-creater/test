<script>
    const authToken = localStorage.getItem("auth_token");
    const userRole = localStorage.getItem("role");
    const currentPage = window.location.pathname;

    // Pages restricted to admins only
    const adminPages = [
        "../admin/index.php",
        "../admin/nxt-pages/order-table.php",
        // Add more full path admin-only pages here
    ];

    // Pages restricted to customers only
    const customerPages = [
        "/pages/order-complete.php",
        "/pages/checkout.php",
        "/pages/profile.php"
        // Add more full path customer-only pages here
    ];

    // Step 1: If no token, block access to admin or customer pages
    if (!authToken) {
        if (adminPages.includes(currentPage) || customerPages.includes(currentPage)) {
            window.location.href = "../sign-in.php";
        }
    }

    // Step 2: If token exists, validate access based on role
    else {
        if (userRole === "admin") {
            if (!adminPages.includes(currentPage)) {
                window.location.href = "../sign-in.php";
            }
        } else if (userRole === "customer") {
            if (!customerPages.includes(currentPage)) {
                window.location.href = "../sign-in.php";
            }
        } else {
            // Invalid or unknown role
            window.location.href = "../sign-in.php";
        }
    }
</script>
