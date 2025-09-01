from flask import Flask, render_template

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/dashboard')
def dashboard():
    return render_template('dashboard.html')

# Routes untuk individual components
@app.route('/suara')
def suara():
    return render_template('suara.html')

@app.route('/top_partai')
def top_partai():
    return render_template('top_partai.html')

@app.route('/ideologi')
def ideologi():
    return render_template('ideologi.html')

@app.route('/koalisi')
def koalisi():
    return render_template('koalisi.html')

# Routes untuk clustering (serve HTML files dari Colab)
@app.route('/clustering_results')
def clustering_results():
    return render_template('clustering_results.html')

@app.route('/cluster_analysis')
def cluster_analysis():
    return render_template('cluster_analysis.html')

@app.route('/cluster_validation')
def cluster_validation():
    return render_template('cluster_validation.html')

@app.route('/peta_kelurahan')
def peta_kelurahan():
    return render_template('peta_kelurahan.html')

@app.route('/peta_kecamatan')
def peta_kecamatan():
    return render_template('peta_kecamatan.html')

@app.route('/peta_kabupaten')
def peta_kabupaten():
    return render_template('peta_kabupaten.html')

@app.route('/peta_dapil')
def peta_dapil():
    return render_template('peta_dapil.html')

if __name__ == '__main__':
    app.run(debug=True)