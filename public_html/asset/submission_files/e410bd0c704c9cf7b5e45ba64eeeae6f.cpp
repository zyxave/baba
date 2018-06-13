#include<bits/stdc++.h>
using namespace std;

int ada[1000001],t,ans,n,p,q,r,x[1000001],y[1000001],z[1000001],mins;

int cek(int a,int ind)
{
//	cout<<ind<<" **** "<<a<<" "<<ada[y[ind]]<<endl;
	if((ada[y[ind]]>0) || (y[ind]==q))
	{
		ans+=z[ind];
//		cout<<"----- "<<ans<<endl;
		cek(y[ind],ada[y[ind]]);
		return ans;
	}
	return 0;
}

int main ()
{
	cin>>t;
	while(t--)
	{
		mins=1000000001;
		for(int i=1;i<=101;i++)
		{
			ada[i]=0;
		}
		cin>>n>>p>>q>>r;
		for(int i=1;i<=n;i++)
		{
			cin>>x[i]>>y[i]>>z[i];
			ada[x[i]]=i;
		}
		for(int i=1;i<=n;i++)
		{
			if(x[i]==p)
			{
		//		cout<<"****  "<<i<<endl;
				ans=0;
				cek(x[i],i);
				if(ans<mins) mins=ans;
			}
		}
		if((mins!=1000000001) && (mins!=0)) 
		{
			if(mins<=r) cout<<mins<<endl;
			else cout<<"Andi tidak bisa mengikuti seminar"<<endl;
		}
		else
		{
			cout<<"Andi tidak bisa mengikuti seminar"<<endl;
		}
	}
}
