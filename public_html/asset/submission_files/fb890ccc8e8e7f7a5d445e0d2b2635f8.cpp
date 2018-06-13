#include <bits\stdc++.h>
using namespace std;

int main ()
{
	int t;
	cin>>t;
	for (int tc=0; tc<t; tc++)
	{
		int ans=0;
		long int r;
		int p,a,m;
		cin>>p>>a>>m>>r;
		while (r>p)
		{
			r-=p;
			if (p>=m+a)
			{
				p-=a;
			}
			else
			if (p<=m+a)
			{
				p=m;
			}
			ans++;
		}
		cout<<ans<<endl;
	}
	/*60 43 29 18 10 4
	*/
	
	return 0;
}

