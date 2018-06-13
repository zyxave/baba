#include<bits/stdc++.h>
using namespace std;

int t,n,m,mins,x,y,i,sel,a[1000001];

int main ()
{
	cin>>t;
	while(t--)
	{
		mins=10000000;
		cin>>n>>m;
		x=0;
		y=0;
		for(int i=1;i<=n;i++)
		{
			cin>>a[i];
		}
		sort(a+1,a+n+1);
		i=0;
		while(i<n)
		{
			if(a[i]+a[n-i+1]==m)
			{
				sel=a[n-i-1]-a[i];
				if(sel<mins)
				{
					mins=sel;
					x=a[i];
					y=a[n-i+1];
					if(x>y)
					{
						int temp=y;
						y=x;
						x=temp;
					}
				}
			}
			i++;
		}
		if(mins==10000000) cout<<"Billy rapopo"<<endl;
		else cout<<x<<" "<<y<<endl;
	}
}
