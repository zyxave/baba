#include <bits/stdc++.h>
using namespace std;

string uni[10000];
int jumlah[10000];
int EX=0;

int find(int n)
{
		int TEMP=100000000;
		int Y;
		for(int z=0;z<n;z++)
		{
			if(z==EX)
				continue;
				
			else
			{
				min(TEMP, jumlah[z]);
				if(jumlah[z]<TEMP)
					Y = z;
			}
			
		}
	return Y;
}
		
int main ()
{
	int t,x,y,z;
	scanf("%d",&t);
	for (int T=0;T<t;T++)
	{
		int ans=0,n,m,start;
		map<string, int> locate;
		map<string, int> sinyal;
		queue <string> quer;
		
		cin>>n;
		for(x=1;x<=n;x++)
		{
			cin>>uni[x];	
			sinyal[uni[x]]+=1;
			locate[uni[x]]=x;
		}
		
		cin>>m;
		string temp;
		for(x=1;x<=m;x++)
		{
			cin>>temp;	
			if(sinyal[temp]>0)
			{
				quer.push(temp);
				jumlah[locate[temp]]+=1;		
			}
		}
		
		start = find(n);
		while(!quer.empty())
		{
			if(quer.front()==uni[start])
			{
				EX = locate[quer.front()];
				jumlah[locate[quer.front()]] = jumlah[locate[quer.front()]] - 1;
				start = find(n);
				ans+=1;
				quer.pop();
			}
			
			else
			{
				jumlah[locate[quer.front()]] = jumlah[locate[quer.front()]] - 1;
				quer.pop();
			}
		}
		printf("%d\n",ans);
	}

		
}
