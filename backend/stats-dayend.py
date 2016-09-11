from time import strftime

stats={}
with open("pagv") as f:
    for line in f:
        if line!="":
            lsp=line.strip("\n").split("|")
            if lsp[0] in stats:
                stats[lsp[0]]+=int(lsp[1])
            else:
                stats[lsp[0]]=int(lsp[1])
if stats!={}:
    with open("vtoday") as f:
        for line in f.readlines():
            lsp=line.strip("\n")
            lsp = lsp.split("?lang=")[0]
            if lsp in stats:
                stats[lsp]+=1
            else:
                stats[lsp]=1

    pre=""
    out=""
    for a in sorted(stats,key=stats.get,reverse=True):
        out+=pre+a+"|"+str(stats[a])
        pre="\n"

    with open("pagv","w") as f:
        f.write(out)
    with open("vtoday","w") as f:
        f.write("")


firstline=True
referdict={}
referlist=[]
datelist=[]
stats_refer={}
with open("referers-summary") as f:
    for line in f:
        if not firstline:
            lsp=line.strip("\n").split(",")
            date = lsp[0].split("-")
            if len(date)>2 and date[0]+"-"+date[1]!=strftime("%Y-%m"):
                lsp[0] = date[0]+"-"+date[1]
            if len(date)>1 and date[0]!=strftime("%Y"):
                lsp[0] = date[0]
            if lsp[0] not in stats_refer:
                stats_refer[lsp[0]] = []
                datelist.append(lsp[0])
            for i,stat in enumerate([0]+lsp[1:]):
                while i>=len(stats_refer[lsp[0]]):
                    stats_refer[lsp[0]].append(0)
                if stat=="": stat=0
                stats_refer[lsp[0]][i]+=int(stat)
        else:
            lsp=line.strip("\n").split(",")
            for i,site in enumerate(lsp):
              if site not in referdict:
                referdict[site]=i
                referlist.append(site)
            firstline=False

with open("referers") as f:
    for line in f:
        lsp=line.split("|")
        datespl=lsp[0].split(" ")[0].split("-")
        referdate=datespl[0]+"-"+datespl[1]
        if referdate==strftime("%Y-%m"):
            referdate+="-"+datespl[2]
        referer=lsp[2].strip("\n")
        if referer=="?": referer="?"
        elif "google" in referer: referer="Google"
        elif "youtube" in referer: referer="YouTube"
        elif "yahoo" in referer: referer="Yahoo!"
        elif "facebook" in referer: referer="Facebook"
        elif "twitter" in referer: referer="Twitter"
        elif "reddit" in referer: referer="reddit"
        elif "t.co" in referer: referer="Twitter"
        else:
            referer=referer.strip("http://")
            referer=referer.strip("https://")
            referer=referer.split("/")[0]
        if referdate not in stats_refer:
            stats_refer[referdate]=[0]*len(referdict)

            datelist.append(referdate)
        if referer not in referdict:
            referdict[referer]=len(referdict)
            referlist.append(referer)
        while len(stats_refer[referdate])<=referdict[referer]:
            stats_refer[referdate].append(0)
        stats_refer[referdate][referdict[referer]]+=1


output=",".join(referlist)


for i in datelist:
    output+="\n"+i+","
    output+=",".join([str(k) for k in stats_refer[i][1:]]).strip("[").strip("]")



with open("referers-summary","w") as f:
    f.write(output)
with open("referers","w") as f:
    f.write("")
