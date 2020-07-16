import plotly
import json

with open('data0.json') as file:
    data = json.load(file)
    for flows in data['flows']:
        print('IPV4_SRC_ADDR:', flows['IPV4_SRC_ADDR'])
        print('IPV4_DST_ADDR:', flows['IPV4_DST_ADDR'])
        print('IN_BYTES:', flows['IN_BYTES'])
        print('')

# create a simple plot
bar = plotly.graph_objs.Scatter(x=[flows['IPV4_SRC_ADDR']],y=[flows['IN_BYTES']],mode='lines+markers',name='lines+markers')


layout = plotly.graph_objs.Layout()
fig = plotly.graph_objs.Figure([bar], layout)

# convert it to JSON
fig_json = fig.to_json()

# a simple HTML template
template = """<html>
<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <div id='divPlotly'></div>
    <script>
        var plotly_data = {}
        Plotly.react('divPlotly', plotly_data.data, plotly_data.layout);
    </script>
</body>

</html>"""

# write the JSON to the HTML template
with open('index.html', 'w') as f:
    f.write(template.format(fig_json))
