#include<bits/stdc++.h>
using namespace std;
int jab(int e)
{
	e=0.5*(e*e-e);
	return e;
}
int main()
{
	int t,n,i,j,hasil;
	cin>>t;
	for(i=1;i<=t;i++)
	{
		cin>>n;
		for(j=1;j<=10000;j++)
		{
			if (jab(j)>=n)
			{
				hasil=j;
				j=10000;
			}
		}
		cout<<hasil<<endl;
	}
	
}
