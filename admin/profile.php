

import React, { useState, useEffect } from 'react';
import './ServiceForm.css';
import { validateFormData } from './validateFormData';
import Select from 'react-select';

function ServiceForm() {
  const [options, setOptions] = useState([]);
  const [qualificationsOptions, setQualificationsOptions] = useState([]);

  const [formData, setFormData] = useState({
    cost: '',
    location: '',
    availability: '',
    about: '',
    skills: [], // Array for multiple skill selections
    qualifications: '',
    description: ''
  });

  const [errors, setErrors] = useState({}); // State to hold validation errors

  // Fetch skills options from the API
  useEffect(() => {
    const fetchSkills = async () => {
      try {
        const response = await fetch('http://localhost:5000/api/skills');
        const data = await response.json();
        const formattedOptions = data.map(skill => ({ value: skill.id, label: skill.name }));
        setOptions(formattedOptions);
      } catch (error) {
        console.error('Error fetching skills:', error);
      }
    };

    fetchSkills();
  }, []);

  // Fetch qualifications options from the API
  useEffect(() => {
    const fetchQualifications = async () => {
      try {
        const response = await fetch('http://localhost:5000/api/qualifications');
        const data = await response.json();
        const formattedQualifications = data.map(qualification => ({
          value: qualification.id,
          label: qualification.name
        }));
        setQualificationsOptions(formattedQualifications);
      } catch (error) {
        console.error('Error fetching qualifications:', error);
      }
    };

    fetchQualifications();
  }, []);

  // Handle change for regular inputs
  const handleChange = (e) => {
    const { name, value } = e.target;

    // Clear description when qualification changes
    if (name === 'qualifications') {
      setFormData((prevData) => ({
        ...prevData,
        qualifications: value,
        description: '' // Reset description
      }));
    } else {
      setFormData((prevData) => ({
        ...prevData,
        [name]: value,
      }));
    }
  };

  // Handle change for the Select component
  const handleSkillsChange = (selected) => {
    setFormData((prevData) => ({
      ...prevData,
      skills: selected || [], // Handle case where no option is selected
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const validationErrors = validateFormData(formData);
    setErrors(validationErrors);

    if (Object.keys(validationErrors).length === 0) {
      try {
        const response = await fetch('http://localhost:7244/api/Service', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(formData),
        });

        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        const result = await response.json();
        console.log('Success:', result);
        // Optionally, reset the form or show a success message
        setFormData({
          Name: '',
          cost: '',
          location: '',
          availability: '',
          about: '',
          skills: [],
          qualifications: '',
          description: '',
        });
      } catch (error) {
        console.error('Error:', error);
        // Optionally, show an error message to the user
      }
    } else {
      console.log('Validation errors:', validationErrors);
    }
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Service Provider Information</h2>
      <form onSubmit={handleSubmit} className="service-form">
        <div className="form-group">
          <label>Name</label>
          <input
            type="text"
            name="Name"
            value={formData.Name}
            onChange={handleChange}
            className={`form-control ${errors.Name ? 'is-invalid' : ''}`}
            placeholder="Enter Name"
            required
          />
          {errors.Name && <div className="invalid-feedback">{errors.Name}</div>}
        </div>
        <div className="form-group">
          <label>Cost</label>
          <input
            type="text"
            name="cost"
            value={formData.cost}
            onChange={handleChange}
            className={`form-control ${errors.cost ? 'is-invalid' : ''}`}
            placeholder="Enter cost"
            required
          />
          {errors.cost && <div className="invalid-feedback">{errors.cost}</div>}
        </div>
        <div className="form-group">
          <label>Location</label>
          <input
            type="text"
            name="location"
            value={formData.location}
            onChange={handleChange}
            className={`form-control ${errors.location ? 'is-invalid' : ''}`}
            placeholder="Enter location"
            required
          />
          {errors.location && <div className="invalid-feedback">{errors.location}</div>}
        </div>
        <div className="form-group">
          <label>Availability</label>
          <input
            type="text"
            name="availability"
            value={formData.availability}
            onChange={handleChange}
            className={`form-control ${errors.availability ? 'is-invalid' : ''}`}
            placeholder="Enter availability"
            required
          />
          {errors.availability && <div className="invalid-feedback">{errors.availability}</div>}
        </div>
        <div className="form-group">
          <label>About My Service</label>
          <textarea
            name="about"
            value={formData.about}
            onChange={handleChange}
            className={`form-control ${errors.about ? 'is-invalid' : ''}`}
            rows="3"
            placeholder="Describe your service"
            required
          ></textarea>
          {errors.about && <div className="invalid-feedback">{errors.about}</div>}
        </div>
        <div className="form-group">
          <label>Skills</label>
          <Select
            options={options}
            isMulti
            value={formData.skills}
            onChange={handleSkillsChange} // Use the specific skills handler
            closeMenuOnSelect={false}
            placeholder="Select Skills"
          />
          {errors.skills && <div className="invalid-feedback">{errors.skills}</div>}
        </div>
        <div className="form-group">
          <label>Qualifications</label>
          <select
            name="qualifications"
            value={formData.qualifications}
            onChange={handleChange}
            className={`form-control ${errors.qualifications ? 'is-invalid' : ''}`}
            required
          >
            <option value="">Select your qualification</option>
            {qualificationsOptions.map((option) => (
              <option key={option.value} value={option.value}>
                {option.label}
              </option>
            ))}
          </select>
          {errors.qualifications && <div className="invalid-feedback">{errors.qualifications}</div>}

          {/* Conditionally render the input field for description */}
          {formData.qualifications && (
            <div className="form-group mt-3">
              <label>Qualification Description</label>
              <input
                type="text"
                name="description"
                value={formData.description}
                onChange={handleChange}
                className="form-control"
                placeholder={`Describe your ${formData.qualifications}`}
                required
              />
            </div>
          )}
        </div>
        <button type="submit" className="btn btn-primary btn-block mt-4">
          Submit
        </button>
      </form>
    </div>
  ); 
}

export default ServiceForm;
