#include<bits/stdc++.h>
#define mp make_pair
#define ss second
#define ff first
using namespace std;
int t,n,a;
pair <int,int> z[1000005];
char s[1005][1005];
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		for(a=0;a<n;a++)
		{
			scanf("%s",&s[a]);
			z[a]=mp(strlen(s[a]),a);
		}
		sort(z,z+n);
		for(a=0;a<n;a++)
		{
			printf("%s\n",s[z[a].ss]);
		}
	}
}
