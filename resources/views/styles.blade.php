body {
font-family: Arial, sans-serif;
background-color: #f5f7fa;
padding: 20px;
color: #2d3748;
}

h1 {
margin-bottom: 20px;
}

a {
text-decoration: none;
}

.top-actions {
margin-bottom: 20px;
display: flex;
gap: 10px;
flex-wrap: wrap;
}

.btn {
display: inline-block;
padding: 6px 12px;
border-radius: 4px;
font-size: 14px;
color: white;
text-decoration: none;
border: none;
cursor: pointer;
transition: background-color 0.2s ease, opacity 0.2s ease;
}

.btn-primary {
background-color: #3490dc;
}

.btn-primary:hover {
background-color: #2779bd;
}

.btn-success {
background-color: #38c172;
}

.btn-success:hover {
background-color: #2d995b;
}

.btn-danger {
background-color: #e3342f;
}

.btn-danger:hover {
background-color: #cc1f1a;
}

.btn-warning {
background-color: #f6993f;
}

.btn-warning:hover {
background-color: #de751f;
}

.table-wrapper {
background: white;
border-radius: 6px;
overflow: hidden;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

table {
width: 100%;
border-collapse: collapse;
background: white;
}

th {
background-color: #2d3748;
color: white;
text-align: left;
padding: 12px 10px;
}

td {
padding: 10px;
border-bottom: 1px solid #e2e8f0;
vertical-align: middle;
}

tr:hover {
background-color: #f1f5f9;
}

select {
padding: 5px 8px;
border-radius: 4px;
border: 1px solid #ccc;
background: white;
}

.actions {
display: flex;
gap: 8px;
align-items: center;
flex-wrap: wrap;
}

.status-form {
display: flex;
gap: 8px;
align-items: center;
flex-wrap: wrap;
margin: 0;
}

.status-form button,
.actions form {
margin: 0;
}

.actions form {
display: inline-block;
}

.empty-cell {
text-align: center;
color: #718096;
padding: 16px;
}

/* FORMS */

.form-container {
background: white;
padding: 20px;
border-radius: 6px;
max-width: 500px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.form-group {
margin-bottom: 15px;
}

label {
display: block;
margin-bottom: 6px;
font-weight: bold;
}

input,
textarea,
select {
width: 100%;
box-sizing: border-box;
}

input,
textarea {
padding: 8px;
border-radius: 4px;
border: 1px solid #ccc;
}

textarea {
min-height: 100px;
resize: vertical;
}

/* KANBAN */

.kanban {
display: flex;
gap: 20px;
align-items: flex-start;
flex-wrap: wrap;
}

.kanban-column {
flex: 1;
min-width: 280px;
background: white;
border-radius: 6px;
padding: 15px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.kanban-column h2 {
margin-top: 0;
margin-bottom: 15px;
font-size: 20px;
}

.card {
background: #f1f5f9;
border-left: 4px solid #3490dc;
padding: 12px;
margin-bottom: 12px;
border-radius: 4px;
}

.card strong {
display: block;
margin-bottom: 6px;
}

.card p {
margin: 0;
color: #4a5568;
}

.empty {
color: #888;
font-style: italic;
}

.mt-10 {
margin-top: 10px;
}

.mt-20 {
margin-top: 20px;
}

/* TASK DETAILS */
.details-card {
background: white;
padding: 20px;
border-radius: 6px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
margin-bottom: 20px;
}

.details-card h2 {
margin-top: 0;
margin-bottom: 15px;
}

.details-card p {
margin-bottom: 15px;
line-height: 1.5;
}

.subtasks-section {
background: white;
padding: 20px;
border-radius: 6px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.section-title {
margin-top: 20px;
margin-bottom: 15px;
}

.subtasks-list {
display: flex;
flex-direction: column;
gap: 10px;
margin-top: 10px;
}

.subtask-card {
background: #f1f5f9;
border-left: 4px solid #38c172;
padding: 12px;
border-radius: 4px;
}

.status-badge {
display: inline-block;
background-color: #3490dc;
color: white;
padding: 4px 10px;
border-radius: 999px;
font-size: 13px;
font-weight: bold;
}
