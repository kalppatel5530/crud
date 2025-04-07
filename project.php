<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Registration Form</title>
  <style>
    :root {
      --primary-color: #4e73df;
      --secondary-color: #f8f9fc;
      --border-color: #e2e6ea;
      --text-color: #343a40;
      --accent-color: #1cc88a;
      --danger-color: #e74a3b;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f95dfe;
      padding: 30px;
    }

    .container {
  max-width: 900px;
  margin: auto;
  background: #fff;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 0 30px rgba(173, 101, 255, 0.5);

}


    h2 {
      text-align: center;
      color: var(--primary-color);
      margin-bottom: 10px;
    }

    .divider {
      width: 100px;
      height: 3px;
      background-color: #dcdcdc;
      margin: 0 auto 30px auto;
      border-radius: 5px;
    }

    form {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 20px 40px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      color: var(--text-color);
      margin-bottom: 8px;
    }

    input, select, textarea {
      padding: 10px 12px;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      font-size: 1rem;
      background-color: #f0f0f0;
      color: #555;
    }

    input:read-only, textarea:read-only {
      cursor: not-allowed;
      background-color: #f4f4f4;
      border-style: dashed;
    }

    textarea {
      resize: none;
    }

    .form-actions {
      grid-column: span 2;
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }

    button {
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .submit-btn {
      background-color: var(--accent-color);
      color: white;
    }

    .submit-btn:hover {
      background-color: #17a673;
    }

    .clear-btn {
      background-color: var(--danger-color);
      color: white;
    }

    .clear-btn:hover {
      background-color: #c0392b;
    }

    @media (max-width: 768px) {
      .form-actions {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Student Registration Form</h2>
    <div class="divider"></div>

    <form id="registrationForm">
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" placeholder="First name" />
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" placeholder="Last name" />
      </div>
      
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email"/>
      </div>
      <div class="form-group">
  <label>Gender</label>
  <div style="display: flex; gap: 20px; align-items: center;">
    <label>
      <input type="radio" name="gender" value="Male"/> Male
    </label>
    <label>
      <input type="radio" name="gender" value="Female"/> Female
    </label>
    <label>
      <input type="radio" name="gender" value="Other"/> Other
    </label>
  </div>
</div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3" ></textarea>
      </div>
     

      <div class="form-group">
  <label for="caste">Caste</label>
  <select id="caste" name="caste" >
    <option value="">-- Select Caste --</option>
    <option value="General">General</option>
    <option value="OBC">OBC</option>
    <option value="SC">SC</option>
    <option value="ST">ST</option>
  </select>
</div>
      <div class="form-group">
        <label for="fatherName">Father's Name</label>
        <input type="text" id="fatherName" name="fatherName" placeholder="Father name" />
      </div>
      <div class="form-group">
        <label for="motherName">Mother's Name</label>
        <input type="text" id="motherName" name="motherName" placeholder="Mother name" />
      </div>
      <div class="form-group">
        <label for="nationality">Nationality</label>
        <input type="text" id="nationality" name="nationality"  />
      </div>
      <div class="form-group">
        <label for="photo">Student Photo</label>
        <input type="file" id="photo" name="photo" accept="image/*" />
      </div>

      <div class="form-actions">
        <button type="submit" class="submit-btn">Submit</button>
        <button type="reset" class="clear-btn" style="background-color:red">Clear</button>
      </div>
    </form>
  </div>
</body>
</html>
