from flask import Flask, request, render_template
from sklearn.tree import DecisionTreeClassifier, plot_tree
import numpy as np
import matplotlib.pyplot as plt

app = Flask(__name__)

# Sample data (training data) - Jamur
# Columns: [Color, Size, Points]
# Red = 0, Brown = 1, Green = 2
# Small = 0, Large = 1
# Yes = 1, No = 0
X = np.array([
    [0, 0, 1],  # Red, Small, Yes (Toxic)
    [1, 0, 0],  # Brown, Small, No (Edible)
    [1, 1, 1],  # Brown, Large, Yes (Edible)
    [2, 0, 0],  # Green, Small, No (Edible)
    [0, 1, 0],  # Red, Large, No (Edible)
])

# Target (Edibility: Toxic = 0, Edible = 1)
y = np.array([0, 1, 1, 1, 1])

# Train Decision Tree Model
model = DecisionTreeClassifier()
model.fit(X, y)

# Save the decision tree plot to a file
def save_tree_plot():
    plt.figure(figsize=(10, 6))
    plot_tree(model, feature_names=['Color', 'Size', 'Points'], class_names=['Toxic', 'Edible'], filled=True)
    plt.savefig('static/tree_plot.png')

# Generate the tree plot on start
save_tree_plot()

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/predict', methods=['POST'])
def predict():
    # Retrieve form data
    color = int(request.form['color'])  # Red=0, Brown=1, Green=2
    size = int(request.form['size'])    # Small=0, Large=1
    points = int(request.form['points'])  # Yes=1, No=0
    
    # Predict using the trained model
    input_data = np.array([[color, size, points]])
    prediction = model.predict(input_data)
    
    # Convert prediction to readable form
    if prediction == 1:
        result = 'Edible'
    else:
        result = 'Toxic'
    
    return render_template('index.html', prediction_text=f'The mushroom is {result}')

if __name__ == "__main__":
    app.run(debug=True)
