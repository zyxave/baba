#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,n,i,j,hz;
char c;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		for(i=1;i<=n;i++)
		{
			hz=0;
			for(j=0;j<8;j++)
			{
				cin>>c;
				if(c=='P')
					hz+=(1<<(8-j-1));
			}
			//cout<<hz<<"\n";
			cout<<char(hz);
		}
		cout<<"\n";
		
	}
	
}
