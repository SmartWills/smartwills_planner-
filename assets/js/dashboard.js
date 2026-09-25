// ---------- Course Data ----------
const coursesData = {
    all: [
        { title: 'Legal Mastery', desc: 'Fundamentals of Singapore Wills', btn: 'Review' },
        { title: 'Trust & Legacy', desc: 'Inter Vivos Trust Model', btn: 'Resume' },
        { title: 'Estate Planning 101', desc: 'Introduction to Estate Planning', btn: 'Start' },
        { title: 'Advanced Will Drafting', desc: 'Complex Will Structures', btn: 'Enroll' }
    ],
    sg: [
        { title: 'CSPS', desc: 'Certified SmartPlanner Singapore', btn: 'Review' },
        { title: 'CSPS-i', desc: 'Certified SmartPlanner Singapore Islamic', btn: 'Resume' },
        { title: 'CLPA', desc: 'Certified Licensed Property Association', btn: 'Learn' }
    ],
    my: [
        { title: 'CSPM', desc: 'Certified SmartPlanner Malaysia', btn: 'Start' },
        { title: 'CSPM-i', desc: 'Certified SmartPlanner Malaysia Islamic', btn: 'Enroll' },
    ],
    th: [
        { title: 'Thai Civil Code', desc: 'Estate Administration in Thailand', btn: 'Begin' },
        { title: 'Thai Wills & Inheritance', desc: 'Legal Requirements', btn: 'Study' },
        { title: 'Cross-Border Estate', desc: 'Thai-Singapore Comparison', btn: 'Review' }
    ],
    mywa: [
        { title: 'MYWA Certification', desc: 'Professional Will Writing', btn: 'Start' },
        { title: 'Ethics in Estate Planning', desc: 'Code of Conduct for MYWA', btn: 'Enroll' },
        { title: 'Advanced MYWA Practicum', desc: 'Case Studies & Applications', btn: 'Resume' }
    ]
};

// DOM refs
const dropdownToggle = document.getElementById('dropdownToggle');
const dropdownMenu = document.getElementById('dropdownMenu');
const dropdownArrow = document.getElementById('dropdownArrow');
const selectedLabel = document.getElementById('selectedLabel');
const tabButtons = document.querySelectorAll('.tab:not(.dropdown-toggle)');
const menuItems = dropdownMenu.querySelectorAll('li');
const searchInput = document.getElementById('searchCourse');
const searchBtn = document.getElementById('searchBtn');

let currentTab = 'all';
let allCourses = [];

// Flatten all courses for search
function flattenCourses() {
    const flat = [];
    for (const key in coursesData) {
        coursesData[key].forEach(c => {
            flat.push({ ...c, category: key });
        });
    }
    return flat;
}
allCourses = flattenCourses();

function renderCourses(tabKey, searchTerm = '') {
    const grid = document.getElementById('courseGrid');
    let courses = [];
    if (tabKey === 'all') {
        courses = coursesData.all.slice();
    } else {
        courses = coursesData[tabKey] || [];
    }

    // Apply search filter
    if (searchTerm.trim() !== '') {
        const term = searchTerm.trim().toLowerCase();
        courses = courses.filter(c =>
            c.title.toLowerCase().includes(term) ||
            c.desc.toLowerCase().includes(term)
        );
    }

    if (courses.length === 0) {
        grid.innerHTML = '<p style="grid-column:1/-1; text-align:center; color:#888; padding:40px 0;">No courses found.</p>';
        return;
    }

    let html = '';
    courses.forEach(course => {
        html += `
            <div class="course-card">
                <div class="course-image"></div>
                <h4>${course.title}</h4>
                <p>${course.desc}</p>
                <button>${course.btn}</button>
            </div>
        `;
    });
    grid.innerHTML = html;
}

function setActiveTab(tabKey) {
    // Update dropdown items
    menuItems.forEach(item => {
        item.classList.toggle('active', item.getAttribute('data-tab') === tabKey);
    });
    const label = tabKey === 'all' ? 'All' : tabKey.toUpperCase();
    selectedLabel.textContent = label;

    // Update independent buttons
    tabButtons.forEach(btn => {
        const btnTab = btn.getAttribute('data-tab');
        btn.classList.toggle('active', btnTab === tabKey);
    });

    currentTab = tabKey;
    // Re-render with current search term
    const searchTerm = searchInput.value;
    renderCourses(tabKey, searchTerm);
}

// Dropdown toggle
dropdownToggle.addEventListener('click', function (e) {
    e.stopPropagation();
    dropdownMenu.classList.toggle('open');
    dropdownArrow.classList.toggle('open');
});

// Close dropdown on outside click
document.addEventListener('click', function (e) {
    if (!e.target.closest('.dropdown')) {
        dropdownMenu.classList.remove('open');
        dropdownArrow.classList.remove('open');
    }
});

// Dropdown item click
menuItems.forEach(item => {
    item.addEventListener('click', function () {
        const tabKey = this.getAttribute('data-tab');
        setActiveTab(tabKey);
        dropdownMenu.classList.remove('open');
        dropdownArrow.classList.remove('open');
    });
});

// Independent tab clicks
tabButtons.forEach(btn => {
    btn.addEventListener('click', function () {
        const tabKey = this.getAttribute('data-tab');
        setActiveTab(tabKey);
        dropdownMenu.classList.remove('open');
        dropdownArrow.classList.remove('open');
    });
});

// Search functionality
function handleSearch() {
    const term = searchInput.value;
    renderCourses(currentTab, term);
}

searchBtn.addEventListener('click', handleSearch);
searchInput.addEventListener('keyup', function (e) {
    if (e.key === 'Enter') {
        handleSearch();
    }
});

// Initial render
document.addEventListener('DOMContentLoaded', function () {
    setActiveTab('all');
});