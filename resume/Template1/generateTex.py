#!/usr/bin/python
import sys, json, re
from pprint import pprint
from subprocess import call, Popen
import os
def type1(id):
	idData = data[id]
	if len(idData)<1:
		return ""
	str = "\\vspace{-10pt}\\section{\\underline{"
	if id == "scholastic":
		str += "SCHOLASTIC ACHIEVEMENTS"
	elif id == "extra":
		str += "EXTRA CURRICULAR ACTIVITIES"	
	str += "}} \\begin{itemize} \\itemsep -2pt "

	for item in idData:
		item = replaceSpecialChars(item)
		str += "\\item " + item
	str += "\\end{itemize}\n"
	return str

def type2(id):
	idData = data[id]
	if len(idData)<1:
		return ""
	str = "\\vspace{-10pt}\\section{\\underline{"
	if id == "project":
		str += "KEY ACADEMIC PROJECTS"
	elif id == "por":
		str += "POSITIONS OF RESPONSIBILITY"
	elif id == "internship":
		str += "INTERNSHIPS"	
	str += "}}"

	for project in idData:
		project["title"] = replaceSpecialChars(project["title"])
		project["duration"] = replaceSpecialChars(project["duration"])
		project["subtitle"] = replaceSpecialChars(project["subtitle"])

		str += "\\textbf{" + project["title"] + "} \\hfill \\emph {"
		str += project["duration"] + "} \\\\"
		if project["subtitle"] != "":
			str += "\\textsl{" + project["subtitle"] + "}\\hfill" 
		if len(project["description"]) > 0:
			str += "\\begin{itemize} \\itemsep -2pt"
			for item in project["description"]:
				item = replaceSpecialChars(item)
				str += "\\item " + item
			str += "\\end{itemize}"
	return str

def personal(id):
	return ""

def skill(id):
	idData = data[id]
	if len(idData)<1:
		return ""
	str = " \\vspace{-10pt}\\section{\\underline{SKILLS}} \\begin{tabular}{p{4cm} l}"
	for topic in idData.keys():
		idData[topic] = replaceSpecialChars(idData[topic])	
		cleanedTopic = replaceSpecialChars(topic)	
		str += cleanedTopic + " & " + idData[topic] + "\\\\"
	str += " \\end{tabular}"		
	return str

def course(id):
	idData = data[id]
	if len(idData)<1 and len(idData)%2!=0:
		return ""
	str = " \\vspace{-10pt}\\section{\\underline{KEY COURSES UNDERTAKEN}} \\begin{tabular}{p{10cm} l}"
	i = 0;
	while i < len(idData):
		idData[i] = replaceSpecialChars(idData[i])
		idData[i+1] = replaceSpecialChars(idData[i+1])
		str += idData[i] + " & " + idData[i+1] + "\\\\"
		i = i+2
	str += " \\end{tabular}"
	return str


def replaceBoldItalic(output):
	output = re.sub(r'\*\*([^\*\*]+)\*\*', r'\\textbf{\1}', output)
	output = re.sub(r'_([^_]+)_', r'\\textit{\1}', output)
	return output


def replaceSpecialChars(output):
	output = output.replace("\\", "$\\backslash$")		
	specialChars = ["#","$", "%", "&", "~" , "^", "{", "}"]
	for char in specialChars:
		output = output.replace(char, "\\"+char)
	return output

def jsonToTex(data):
	header = "\\documentclass[11pt]{res} \\newsectionwidth{0pt}  \\usepackage{fancyhdr} \\renewcommand{\\headrulewidth}{0pt} \\setlength{\\headheight}{24pt} \\setlength{\\headsep}{24pt}  \\setlength{\\headheight}{24pt} \\pagestyle{fancy}     \\cfoot{}          \\topmargin=-0.5in \\usepackage[margin=0.75in]{geometry} \\begin{document}\\thispagestyle{empty} \\begin{resume}\\vspace{10ex}";
	output = header
	for id in data["order"]:
		if id == "internship" or id == "por" or id == "project":
			output += type2(id)
		elif id == "scholastic" or id == "extra":
			output += type1(id)
		elif id == "personal":
			output += personal(id)
		elif id == "course":
			output += course(id)
		elif id == "skill":
			output += skill(id)

	footer = "\\end{resume} \\end{document}"
	output += footer
	output = replaceBoldItalic(output)
	return output

#####################################
if len(sys.argv)!=2:
	print "No username found"
	exit(0)

ldap = sys.argv[1]
directory = "./JSONS/"

filename = directory+ldap+".json"
with open(filename) as data_file:
	data = json.load(data_file)

tex = jsonToTex(data)
filename = ldap+".tex"

out = open(directory+filename, 'w')
out.write(tex)
print "Tex data written\n"
#call(['chmod', '0777', directory+filename])
#out = open(directory+ldap+".log", 'w')
#call(['chmod', '0777', directory+ldap+".log"])

# os.chdir("../JSONS")
# p = os.system("pdflatex "+filename+"&")
# p.wait()
#print "opening devnull"
#DEVNULL = open(os.devnull, 'wb')
#process = Popen(["pdflatex", filename], cwd=directory)#, stdout=DEVNULL, stderr=DEVNULL)
#print "process created"
#process.wait()
#p = Popen(["pdflatex", filename], cwd="/var/www/html/ugacads-iitb/resume/JSONS", shell='true')
#p.wait()
#call(["pdflatex", ldap+".tex"])
