#include<bits/stdc++.h>
using namespace std;
int main()
{
	int t;
	int p,a,m,r;
	int i,j;
	int bg[i];
	cin>>t;
	for(i=1;i<=t;i++)
	{
		cin>>p;
		cin>>a;
		cin>>m;
		cin>>r;
		int jumlah=0;
		bg[i]=0;
		while(jumlah<r)
		{
			jumlah=jumlah+p;
			if(p-a<=m)
			{
				p=m;
			}
			else{
				p=p-a;
			}
			bg[i]++;
		}
	}
	for(i=1;i<=t;i++)
	{
		cout<<bg[i]<<endl;
	}
	
}
